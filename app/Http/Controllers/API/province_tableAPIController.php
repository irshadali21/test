<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createprovince_tableAPIRequest;
use App\Http\Requests\API\Updateprovince_tableAPIRequest;
use App\Models\province_table;
use App\Repositories\province_tableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class province_tableController
 * @package App\Http\Controllers\API
 */

class province_tableAPIController extends AppBaseController
{
    /** @var  province_tableRepository */
    private $provinceTableRepository;

    public function __construct(province_tableRepository $provinceTableRepo)
    {
        $this->provinceTableRepository = $provinceTableRepo;
    }

    /**
     * Display a listing of the province_table.
     * GET|HEAD /provinceTables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $provinceTables = $this->provinceTableRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($provinceTables->toArray(), 'Province Tables retrieved successfully');
    }

    /**
     * Store a newly created province_table in storage.
     * POST /provinceTables
     *
     * @param Createprovince_tableAPIRequest $request
     *
     * @return Response
     */
    public function store(Createprovince_tableAPIRequest $request)
    {
        $input = $request->all();

        $provinceTable = $this->provinceTableRepository->create($input);

        return $this->sendResponse($provinceTable->toArray(), 'Province Table saved successfully');
    }

    /**
     * Display the specified province_table.
     * GET|HEAD /provinceTables/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var province_table $provinceTable */
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            return $this->sendError('Province Table not found');
        }

        return $this->sendResponse($provinceTable->toArray(), 'Province Table retrieved successfully');
    }

    /**
     * Update the specified province_table in storage.
     * PUT/PATCH /provinceTables/{id}
     *
     * @param int $id
     * @param Updateprovince_tableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateprovince_tableAPIRequest $request)
    {
        $input = $request->all();

        /** @var province_table $provinceTable */
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            return $this->sendError('Province Table not found');
        }

        $provinceTable = $this->provinceTableRepository->update($input, $id);

        return $this->sendResponse($provinceTable->toArray(), 'province_table updated successfully');
    }

    /**
     * Remove the specified province_table from storage.
     * DELETE /provinceTables/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var province_table $provinceTable */
        $provinceTable = $this->provinceTableRepository->find($id);

        if (empty($provinceTable)) {
            return $this->sendError('Province Table not found');
        }

        $provinceTable->delete();

        return $this->sendSuccess('Province Table deleted successfully');
    }
}
