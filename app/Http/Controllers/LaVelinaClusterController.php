<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateLaVelinaClusterRequest;
use App\Http\Requests\UpdateLaVelinaClusterRequest;
use App\Repositories\LaVelinaClusterRepository;
use App\User;
use Carbon\Carbon;
use Flash;
use PDF;
use Mail;
use Illuminate\Http\Request;
use Response;
use App\Core\HelperFunction;
use App\Models\Company;
use App\Models\LaVelina;
use App\Models\Summary;
use App\Models\File;
use App\Models\Firm;
use App\Models\ateco_table;
use App\Models\province_table;
use App\Models\sector_table;


class LaVelinaClusterController extends AppBaseController
{
    /** @var  LaVelinaClusterRepository */
    private $laVelinaClusterRepository;

    public function __construct(LaVelinaClusterRepository $laVelinaClusterRepo)
    {
        $this->laVelinaClusterRepository = $laVelinaClusterRepo;
    }

    /**
     * Display a listing of the LaVelinaCluster.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $laVelinaClusters = $this->laVelinaClusterRepository->paginate(10);

        return view('la_velina_clusters.index')
            ->with('laVelinaClusters', $laVelinaClusters);
    }

    /**
     * Show the form for creating a new LaVelinaCluster.
     *
     * @return Response
     */
    public function create()
    {
        $advisors = User::get(['id', 'name']);
        $firms = Firm::get(['id', 'firm_name', 'firm_vat_no']);
        $ateco_code = ateco_table::get(['id', 'code']);
        $province = province_table::get(['id', 'province']);
        $sector = sector_table::get(['id', 'name']);

        return view('la_velina_clusters.create')
            ->with('advisors', $advisors)
            ->with('firms', $firms)
            ->with('ateco_code', $ateco_code)
            ->with('province', $province)
            ->with('sector', $sector);
    }

    /**
     * Store a newly created LaVelinaCluster in storage.
     *
     * @param CreateLaVelinaClusterRequest $request
     *
     * @return Response
     */

    public function filter_result(Request $request)
    {
        // dd($request->all());


        $firms = new Firm();

        if ($request->firm) {
            $firms = $firms->orWhere('id', $request->firm);
        }
        if ($request->sector) {
            $firms =  $firms->orWhere('sector_id', $request->sector);
        }
        if ($request->ateco_code) {
            $firms =  $firms->orWhere('ateco_id', $request->ateco_code);
        }
        if ($request->province) {
            $firms =  $firms->orWhere('province_id', $request->province);
        }
        if ($request->firm_type) {
            $firms =  $firms->orWhere('firm_type', 'LIKE', "%{$request->firm_type}%");
        }
        if ($request->category) {
            $firms =  $firms->orWhere('category', 'LIKE', "%{$request->category}%");
        }
        if ($request->firm_owner) {
            $firms =  $firms->orWhere('firm_owner', 'LIKE', "%{$request->firm_owner}%");
        }
        if ($request->phone_number) {
            $firms =  $firms->orWhere('phone_number', 'LIKE', "%{$request->phone_number}%");
        }

        $companies = $firms->with('ateco')->with('sector')->with('province')->get();
        
        if ($companies == null || empty($companies) || count($companies) == 0) {
            return $this->sendError('0 companies Found');
        }

        return $this->sendResponse($companies, 'companies retrieved successfully');

    }

    /**
     * Store a newly created LaVelinaCluster in storage.
     *
     * @param CreateLaVelinaClusterRequest $request
     *
     * @return Response
     */
    public function store(CreateLaVelinaClusterRequest $request)
    {
        $input = $request->all();
        // dd($input);
        $filters = array();

        $filters = ['company' => $input['firm']];
        $filters += ['sector' => $input['sector']];
        $filters += ['ateco_code' => $input['ateco_code']];
        $filters += ['province' => $input['province']];
        $filters += ['firm_type' => $input['firm_type']];
        $filters += ['category' => $input['category']];
        $filters += ['firm_owner' => $input['firm_owner']];
        $filters += ['phone_number' => $input['phone_number']];
        $input['filters'] = json_encode($filters);

        unset($input['companies']);
        unset($input['benefits']);
        unset($input['inc_send_date']);
        unset($input['certificate_issue_date']);
        unset($input['file_date']);
        unset($input['advisor_name']);
        unset($input['opration_email']);
        unset($input['laVelinaClusters-table_length']);

        $input['companies'] = json_encode($input['company']);
        // $input['name'] = 'test';

        // unset($input['company']);

        $laVelinaCluster = $this->laVelinaClusterRepository->create($input);

        Flash::success('La Velina Cluster saved successfully.');

        return redirect(route('laVelinaClusters.index'));
    }

    /**
     * Display the specified LaVelinaCluster.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laVelinaCluster = $this->laVelinaClusterRepository->find($id);

        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');

            return redirect(route('laVelinaClusters.index'));
        }
        $companies_ids = json_decode($laVelinaCluster->companies );
        $companies = array();
        foreach ($companies_ids as $company_id) {
                
            $array = Firm::where('id' , $company_id)->first();
            if (!empty($array)) {
                array_push($companies, $array);
            }
        }

        return view('la_velina_clusters.show')->with('laVelinaCluster', $laVelinaCluster)->with('companies', $companies);
    }

    /**
     * Show the form for editing the specified LaVelinaCluster.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laVelinaCluster = $this->laVelinaClusterRepository->find($id);

        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');

            return redirect(route('laVelinaClusters.index'));
        }

        return view('la_velina_clusters.edit')->with('laVelinaCluster', $laVelinaCluster);
    }

    /**
     * Update the specified LaVelinaCluster in storage.
     *
     * @param int $id
     * @param UpdateLaVelinaClusterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaVelinaClusterRequest $request)
    {
        $laVelinaCluster = $this->laVelinaClusterRepository->find($id);

        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');

            return redirect(route('laVelinaClusters.index'));
        }

        $laVelinaCluster = $this->laVelinaClusterRepository->update($request->all(), $id);

        Flash::success('La Velina Cluster updated successfully.');

        return redirect(route('laVelinaClusters.index'));
    }

    /**
     * Remove the specified LaVelinaCluster from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laVelinaCluster = $this->laVelinaClusterRepository->find($id);

        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');

            return redirect(route('laVelinaClusters.index'));
        }

        $this->laVelinaClusterRepository->delete($id);

        Flash::success('La Velina Cluster deleted successfully.');

        return redirect(route('laVelinaClusters.index'));
    }

    public function sendlavelina($id){

        $lavelina = LaVelina::get();
        if (empty($lavelina)) {
            Flash::error('create La Velina to Send');
            return redirect(route('lavelina.index'));
        }
        $laVelinaCluster = $this->laVelinaClusterRepository->find($id);
        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');
            return redirect(route('laVelinaClusters.index'));
        }
        return view('la_velina_clusters.send')->with('lavelina', $lavelina)->with('laVelinaCluster', $laVelinaCluster);
    }

    public function send(Request $request){
        
        // dd($request->all());
        
        $laVelinaCluster = $this->laVelinaClusterRepository->find($request->cluster_id);

        if (empty($laVelinaCluster)) {
            Flash::error('La Velina Cluster not found');
            return redirect(route('laVelinaClusters.index'));
        }
        $lavelina = LaVelina::where('id', $request->lavelina_id)->first();
        if (!$lavelina) {
            Flash::error('La Velina not found');
            return redirect(route('laVelinaClusters.index'));
        }

        $Data = HelperFunction::lavelina($request->lavelina_id);
        
        $data["title"] = "LaVelinaFrom Revman";
        $data["subject"] = "LaVelina";
        $data["body"] = "Buondì, <br>
        la presente per inviare quanto in oggetto.<br>
        Cordialità";
        $name = "Lavelina";
        
        $companies_ids = json_decode($laVelinaCluster->companies );

        foreach ($companies_ids as $company_id) {

            $files = Firm::where('id' , $company_id)->first();
            $advisors =$files->levlelina_advisor->name; 
            $Data['advoiser_name'] =  $advisors;
            $pdf = PDF::loadView('lavelina.email', $Data);
            // return $pdf->stream();
            if (!empty($files->email) && !empty($files->email2) ) {
                    $data["email"] = $files->email;
                    $data["opration_email"] = $files->email2;
                    Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
                        $message
                            ->to($data["email"], $data["email"])
                            ->cc([ $data["opration_email"]])
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), $name . ".pdf");
                    });
            }
        }
        Flash::success('La Velina Sent  successfully.');

        return redirect(route('laVelinaClusters.index'));
    }

    // bulk upload function php

}
