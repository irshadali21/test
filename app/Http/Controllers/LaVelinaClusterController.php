<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateLaVelinaClusterRequest;
use App\Http\Requests\UpdateLaVelinaClusterRequest;
use App\Core\HelperFunction;
use App\Models\Company;
use App\Models\LaVelina;
use App\Models\Summary;
use App\Models\File;

use App\Repositories\LaVelinaClusterRepository;
use App\User;
use Carbon\Carbon;
use Flash;
use PDF;
use Mail;
use Illuminate\Http\Request;
use Response;

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
        $exceptThis = [1];
        $companies = Company::get();
        $benefits = Summary::whereNotIn('id', $exceptThis)->pluck('column1', 'id');
        $advisors = User::get(['id', 'name']);

        return view('la_velina_clusters.create')
            ->with('companies', $companies)
            ->with('benefits', $benefits)
            ->with('advisors', $advisors);
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

        $files = new Company();

        if ($request->companies) {
            $files = $files->where('id', $request->companies);

        }

        if ($request->advisor_name || $request->benefits || $request->opration_email || $request->inc_send_date || $request->certificate_issue_date || $request->file_date) {
            $files = $files->whereHas('files', function ($query) use ($request) {
                if ($request->benefits) {
                    $query->where('benefit_id', $request->benefits);
                }
                if ($request->opration_email) {
                    $query->where('opration_email', 'LIKE', "%{$request->opration_email}%");
                }

                if ($request->file_date) {
                    $from = Carbon::parse($request->file_date)->format('Y-m-d');
                    $to = Carbon::parse(now())->format('Y-m-d');
                    $query->whereBetween('created_at', [$from, $to]);
                }

                if ($request->advisor_name) {
                    $query->whereHas('advisor', function ($query) use ($request) {
                        $query->where('name', 'LIKE', "%{$request->advisor_name}%");
                    });
                }

                if ($request->inc_send_date) {
                    $query->whereHas('EmailTrack', function ($query) use ($request) {
                        $from = Carbon::parse($request->inc_send_date)->format('Y-m-d');
                        $to = Carbon::parse(now())->format('Y-m-d');
                        $query->where('model', '!=', 'App\Models\Certificate');
                        $query->whereBetween('created_at', [$from, $to]);
                    });
                }

                if ($request->certificate_issue_date) {
                    $query->whereHas('EmailTrack', function ($query) use ($request) {
                        $from = Carbon::parse($request->certificate_issue_date)->format('Y-m-d');
                        $to = Carbon::parse(now())->format('Y-m-d');
                        $query->where('model', 'App\Models\Certificate');
                        $query->whereBetween('created_at', [$from, $to]);
                    });
                }

            });
        }

        $companies = $files->get();

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

        $filters = ['company' => $input['companies']];
        $filters += ['benefits' => $input['benefits']];
        $filters += ['inc_send_date' => $input['inc_send_date']];
        $filters += ['certificate_issue_date' => $input['certificate_issue_date']];
        $filters += ['file_date' => $input['file_date']];
        $filters += ['advisor_name' => $input['advisor_name']];
        $filters += ['opration_email' => $input['opration_email']];
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
        $input['name'] = 'test';

        unset($input['company']);

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
                
            $array = Company::where('id' , $company_id)->first();
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
        $pdf = PDF::loadView('lavelina.email', $Data);
        
        $data["title"] = "LaVelinaFrom Revman";
        $data["subject"] = "LaVelina";
        $data["body"] = "Buondì, <br>
        la presente per inviare quanto in oggetto.<br>
        Cordialità";
        $name = "Lavelina";
        
        $companies_ids = json_decode($laVelinaCluster->companies );

        foreach ($companies_ids as $company_id) {


            $files = File::where('company_id' , $company_id)->get();
            if (!empty($files) && count($files) ) {
                foreach ($files as $file) {
                    $data["email"] = $file->customer_email;
                    $data["opration_email"] = $file->opration_email;
                    Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf, $name) {
                        $message
                            ->to($data["email"], $data["email"])
                            ->cc([ $data["opration_email"]])
                            ->subject($data["subject"])
                            ->attachData($pdf->output(), $name . ".pdf");
                    });
                }
            }
        }
        Flash::success('La Velina Sent  successfully.');

        return redirect(route('laVelinaClusters.index'));
    }

    // bulk upload function php

}
