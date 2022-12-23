<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFirmRequest;
use App\Http\Requests\UpdateFirmRequest;
use App\Repositories\FirmRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Imports\FirmImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;
use Session;
use App\Models\Firm;
use App\Models\ateco_table;
use App\Models\province_table;
use App\Models\sector_table;



class FirmController extends AppBaseController
{
    /** @var  FirmRepository */
    private $firmRepository;

    public function __construct(FirmRepository $firmRepo)
    {
        $this->firmRepository = $firmRepo;
    }

    /**
     * Display a listing of the Firm.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $firms = $this->firmRepository->UserCriteria()->paginate(20);

        if (auth()->check() && auth()->user()->hasRole('super-admin')) {
            $firms = Firm::withTrashed()->get();
        } else {
            $firms = Firm::withTrashed()->where('created_by', auth()->user()->id)->get();
        }

        return view('firms.index')
            ->with('firms', $firms);
    }

    /**
     * Show the form for creating a new Firm.
     *
     * @return Response
     */
    public function create()
    {
        return view('firms.create');
    }

    /**
     * Store a newly created Firm in storage.
     *
     * @param CreateFirmRequest $request
     *
     * @return Response
     */
    public function store(CreateFirmRequest $request)
    {
        $input = $request->all();

        $firm = $this->firmRepository->create($input);

        Flash::success('Firm saved successfully.');

        return redirect(route('firms.index'));
    }

    /**
     * Display the specified Firm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        return view('firms.show')->with('firm', $firm);
    }

    /**
     * Show the form for editing the specified Firm.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $firm = $this->firmRepository->find($id);
        $ateco = ateco_table::get();
        $province = province_table::get();
        $sector = sector_table::get();
        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        return view('firms.edit')->with('firm', $firm)->with('ateco', $ateco)->with('province', $province)->with('sector', $sector);
    }

    /**
     * Update the specified Firm in storage.
     *
     * @param int $id
     * @param UpdateFirmRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFirmRequest $request)
    {
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        $firm = $this->firmRepository->update($request->all(), $id);

        Flash::success('Firm updated successfully.');

        return redirect(route('firms.index'));
    }

    /**
     * Remove the specified Firm from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        $this->firmRepository->delete($id);

        Flash::success('Firm deleted successfully.');

        return redirect(route('firms.index'));
    }

    public function import()
    {
        return view('firms.import');
    }

    public function import_upload(Request $request)
    {
        // dd($request->all());

         // Handle  Uploaded File
         if($request->hasFile('file')){
            //Get FileName with extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            //get Only FileName
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get only Extension
            $extension = $request->file('file')->getClientOriginalExtension();
            //FileName To Store
            $file = $fileName.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('file')->move(public_path('upload/firms'), $file);
            // dd($file);

            try {
                Excel::import(new FirmImport, public_path('upload/firms/').$file);
    // dd($_SESSION);
                if (Session::has('duplicates')){
                    Flash::error('Some Duplicate Firms are skipped ');
                    Session::forget('duplicates');
                }
                if (Session::has('added')){
                    Flash::success('Firms Imported successfully.');
                    Session::forget('added');
                }
                return redirect(route('firms.index'));

            } catch (\Throwable $th) {
            //    dd($th);
            }

        }else{
            Flash::error('There was an error please try again');

            return redirect(route('firms.import'));
        }


    }

    public function resotre($id)
    {
        $firm = Firm::onlyTrashed()->find($id);

        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        Firm::onlyTrashed()->find($id)->restore();;

        Flash::success('Firm restored successfully.');

        return redirect(route('firms.index'));
    }
}
