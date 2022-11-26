<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createprovince_tableRequest;
use App\Http\Requests\Updateprovince_tableRequest;
use App\Repositories\province_tableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Imports\ProvinceImport;
use Maatwebsite\Excel\Facades\Excel;


class province_tableController extends AppBaseController
{
    /** @var  province_tableRepository */
    private $provinceTableRepository;

    public function __construct(province_tableRepository $provinceTableRepo)
    {
        $this->provinceTableRepository = $provinceTableRepo;
    }

    /**
     * Display a listing of the province_table.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $provinceTables = $this->provinceTableRepository->paginate(10);

        return view('province_tables.index')
            ->with('provinceTables', $provinceTables);
    }

    /**
     * Show the form for creating a new province_table.
     *
     * @return Response
     */
    public function create()
    {
        return view('province_tables.create');
    }

    /**
     * Store a newly created province_table in storage.
     *
     * @param Createprovince_tableRequest $request
     *
     * @return Response
     */
    public function store(Createprovince_tableRequest $request)
    {
        $input = $request->all();

        $provinceTable = $this->provinceTableRepository->create($input);

        Flash::success('Province Table saved successfully.');

        return redirect(route('provinceTables.index'));
    }

    /**
     * Display the specified province_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            Flash::error('Province Table not found');

            return redirect(route('provinceTables.index'));
        }

        return view('province_tables.show')->with('provinceTable', $provinceTable);
    }

    /**
     * Show the form for editing the specified province_table.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            Flash::error('Province Table not found');

            return redirect(route('provinceTables.index'));
        }

        return view('province_tables.edit')->with('provinceTable', $provinceTable);
    }

    /**
     * Update the specified province_table in storage.
     *
     * @param int $id
     * @param Updateprovince_tableRequest $request
     *
     * @return Response
     */
    public function update($id, Updateprovince_tableRequest $request)
    {
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            Flash::error('Province Table not found');

            return redirect(route('provinceTables.index'));
        }

        $provinceTable = $this->provinceTableRepository->update($request->all(), $id);

        Flash::success('Province Table updated successfully.');

        return redirect(route('provinceTables.index'));
    }

    /**
     * Remove the specified province_table from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            Flash::error('Province Table not found');

            return redirect(route('provinceTables.index'));
        }

        $this->provinceTableRepository->delete($id);

        Flash::success('Province Table deleted successfully.');

        return redirect(route('provinceTables.index'));
    }

    public function import(){
        try {
            Excel::import(new ProvinceImport, public_path('/upload/province.xlsx'));

            Flash::success('Province Imported successfully.');
    
            return redirect(route('provinceTables.index'));
    
        } catch (\Throwable $th) {
           dd($th);
        }

    }
}
