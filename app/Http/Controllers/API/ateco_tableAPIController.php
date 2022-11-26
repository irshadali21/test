<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createateco_tableAPIRequest;
use App\Http\Requests\API\Updateateco_tableAPIRequest;
use App\Models\ateco_table;
use App\Repositories\ateco_tableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ateco_tableController
 * @package App\Http\Controllers\API
 */

class ateco_tableAPIController extends AppBaseController
{
    /** @var  ateco_tableRepository */
    private $atecoTableRepository;

    public function __construct(ateco_tableRepository $atecoTableRepo)
    {
        $this->atecoTableRepository = $atecoTableRepo;
    }

    /**
     * Display a listing of the ateco_table.
     * GET|HEAD /atecoTables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $atecoTables = $this->atecoTableRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($atecoTables->toArray(), 'Ateco Tables retrieved successfully');
    }

    /**
     * Store a newly created ateco_table in storage.
     * POST /atecoTables
     *
     * @param Createateco_tableAPIRequest $request
     *
     * @return Response
     */
    public function store(Createateco_tableAPIRequest $request)
    {
        $input = $request->all();

        $atecoTable = $this->atecoTableRepository->create($input);

        return $this->sendResponse($atecoTable->toArray(), 'Ateco Table saved successfully');
    }

    /**
     * Display the specified ateco_table.
     * GET|HEAD /atecoTables/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ateco_table $atecoTable */
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            return $this->sendError('Ateco Table not found');
        }

        return $this->sendResponse($atecoTable->toArray(), 'Ateco Table retrieved successfully');
    }

    /**
     * Update the specified ateco_table in storage.
     * PUT/PATCH /atecoTables/{id}
     *
     * @param int $id
     * @param Updateateco_tableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateateco_tableAPIRequest $request)
    {
        $input = $request->all();

        /** @var ateco_table $atecoTable */
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            return $this->sendError('Ateco Table not found');
        }

        $atecoTable = $this->atecoTableRepository->update($input, $id);

        return $this->sendResponse($atecoTable->toArray(), 'ateco_table updated successfully');
    }

    /**
     * Remove the specified ateco_table from storage.
     * DELETE /atecoTables/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ateco_table $atecoTable */
        $atecoTable = $this->atecoTableRepository->find($id);

        if (empty($atecoTable)) {
            return $this->sendError('Ateco Table not found');
        }

        $atecoTable->delete();

        return $this->sendSuccess('Ateco Table deleted successfully');
    }
}
