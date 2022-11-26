<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createsector_tableAPIRequest;
use App\Http\Requests\API\Updatesector_tableAPIRequest;
use App\Models\sector_table;
use App\Repositories\sector_tableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class sector_tableController
 * @package App\Http\Controllers\API
 */

class sector_tableAPIController extends AppBaseController
{
    /** @var  sector_tableRepository */
    private $sectorTableRepository;

    public function __construct(sector_tableRepository $sectorTableRepo)
    {
        $this->sectorTableRepository = $sectorTableRepo;
    }

    /**
     * Display a listing of the sector_table.
     * GET|HEAD /sectorTables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sectorTables = $this->sectorTableRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sectorTables->toArray(), 'Sector Tables retrieved successfully');
    }

    /**
     * Store a newly created sector_table in storage.
     * POST /sectorTables
     *
     * @param Createsector_tableAPIRequest $request
     *
     * @return Response
     */
    public function store(Createsector_tableAPIRequest $request)
    {
        $input = $request->all();

        $sectorTable = $this->sectorTableRepository->create($input);

        return $this->sendResponse($sectorTable->toArray(), 'Sector Table saved successfully');
    }

    /**
     * Display the specified sector_table.
     * GET|HEAD /sectorTables/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var sector_table $sectorTable */
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            return $this->sendError('Sector Table not found');
        }

        return $this->sendResponse($sectorTable->toArray(), 'Sector Table retrieved successfully');
    }

    /**
     * Update the specified sector_table in storage.
     * PUT/PATCH /sectorTables/{id}
     *
     * @param int $id
     * @param Updatesector_tableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatesector_tableAPIRequest $request)
    {
        $input = $request->all();

        /** @var sector_table $sectorTable */
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            return $this->sendError('Sector Table not found');
        }

        $sectorTable = $this->sectorTableRepository->update($input, $id);

        return $this->sendResponse($sectorTable->toArray(), 'sector_table updated successfully');
    }

    /**
     * Remove the specified sector_table from storage.
     * DELETE /sectorTables/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var sector_table $sectorTable */
        $sectorTable = $this->sectorTableRepository->find($id);

        if (empty($sectorTable)) {
            return $this->sendError('Sector Table not found');
        }

        $sectorTable->delete();

        return $this->sendSuccess('Sector Table deleted successfully');
    }
}
