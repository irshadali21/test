<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createateco_tableRequest;
use App\Http\Requests\Updateateco_tableRequest;
use App\Repositories\ateco_tableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Imports\AtecoImport;
use Maatwebsite\Excel\Facades\Excel;

class ateco_tableController extends AppBaseController
{
    /** @var  ateco_tableRepository */
    private $atecoTableRepository;

    public function __construct(ateco_tableRepository $atecoTableRepo)
    {
        $this->atecoTableRepository = $atecoTableRepo;
    }

    /**
     * Display a listing of the ateco_table.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $atecoTables = $this->atecoTableRepository->paginate(10);

        return view('ateco_tables.index')
            ->with('atecoTables', $atecoTables);
    }

    /**
     * Show the form for creating a new ateco_table.
     *
     * @return Response
     */
    public function create()
    {
        return view('ateco_tables.create');
    }

    /**
     * Store a newly created ateco_table in storage.
     *
     * @param Createateco_tableRequest $request
     *
     * @return Response
     */
    public function store(Createateco_tableRequest $request)
    {
        $input = $request->all();

        $atecoTable = $this->atecoTableRepository->create($input);

        Flash::success('Ateco Table saved successfully.');

        return redirect(route('atecoTables.index'));
    }

    /**
     * Display the specified ateco_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            Flash::error('Ateco Table not found');

            return redirect(route('atecoTables.index'));
        }

        return view('ateco_tables.show')->with('atecoTable', $atecoTable);
    }

    /**
     * Show the form for editing the specified ateco_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            Flash::error('Ateco Table not found');

            return redirect(route('atecoTables.index'));
        }

        return view('ateco_tables.edit')->with('atecoTable', $atecoTable);
    }

    /**
     * Update the specified ateco_table in storage.
     *
     * @param int $id
     * @param Updateateco_tableRequest $request
     *
     * @return Response
     */
    public function update($id, Updateateco_tableRequest $request)
    {
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            Flash::error('Ateco Table not found');

            return redirect(route('atecoTables.index'));
        }

        $atecoTable = $this->atecoTableRepository->update($request->all(), $id);

        Flash::success('Ateco Table updated successfully.');

        return redirect(route('atecoTables.index'));
    }

    /**
     * Remove the specified ateco_table from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            Flash::error('Ateco Table not found');

            return redirect(route('atecoTables.index'));
        }

        $this->atecoTableRepository->delete($id);

        Flash::success('Ateco Table deleted successfully.');

        return redirect(route('atecoTables.index'));
    }

    public function import(){
        try {
            Excel::import(new AtecoImport, public_path('/upload/ateco.xlsx'));

            Flash::success('Ateco Imported successfully.');
    
            return redirect(route('atecoTables.index'));
    
        } catch (\Throwable $th) {
           dd($th);
        }

    }
}
