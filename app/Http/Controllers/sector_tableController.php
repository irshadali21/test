<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createsector_tableRequest;
use App\Http\Requests\Updatesector_tableRequest;
use App\Repositories\sector_tableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Imports\SectorImport;
use Maatwebsite\Excel\Facades\Excel;


class sector_tableController extends AppBaseController
{
    /** @var  sector_tableRepository */
    private $sectorTableRepository;

    public function __construct(sector_tableRepository $sectorTableRepo)
    {
        $this->sectorTableRepository = $sectorTableRepo;
    }

    /**
     * Display a listing of the sector_table.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sectorTables = $this->sectorTableRepository->paginate(10);

        return view('sector_tables.index')
            ->with('sectorTables', $sectorTables);
    }

    /**
     * Show the form for creating a new sector_table.
     *
     * @return Response
     */
    public function create()
    {
        return view('sector_tables.create');
    }

    /**
     * Store a newly created sector_table in storage.
     *
     * @param Createsector_tableRequest $request
     *
     * @return Response
     */
    public function store(Createsector_tableRequest $request)
    {
        $input = $request->all();

        $sectorTable = $this->sectorTableRepository->create($input);

        Flash::success('Sector Table saved successfully.');

        return redirect(route('sectorTables.index'));
    }

    /**
     * Display the specified sector_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            Flash::error('Sector Table not found');

            return redirect(route('sectorTables.index'));
        }

        return view('sector_tables.show')->with('sectorTable', $sectorTable);
    }

    /**
     * Show the form for editing the specified sector_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            Flash::error('Sector Table not found');

            return redirect(route('sectorTables.index'));
        }

        return view('sector_tables.edit')->with('sectorTable', $sectorTable);
    }

    /**
     * Update the specified sector_table in storage.
     *
     * @param int $id
     * @param Updatesector_tableRequest $request
     *
     * @return Response
     */
    public function update($id, Updatesector_tableRequest $request)
    {
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            Flash::error('Sector Table not found');

            return redirect(route('sectorTables.index'));
        }

        $sectorTable = $this->sectorTableRepository->update($request->all(), $id);

        Flash::success('Sector Table updated successfully.');

        return redirect(route('sectorTables.index'));
    }

    /**
     * Remove the specified sector_table from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            Flash::error('Sector Table not found');

            return redirect(route('sectorTables.index'));
        }

        $this->sectorTableRepository->delete($id);

        Flash::success('Sector Table deleted successfully.');

        return redirect(route('sectorTables.index'));
    }
    public function import(){
        try {
            Excel::import(new SectorImport, public_path('/upload/sector.xlsx'));

            Flash::success('Sector Imported successfully.');
    
            return redirect(route('sectorTables.index'));
    
        } catch (\Throwable $th) {
           dd($th);
        }

    }
}
