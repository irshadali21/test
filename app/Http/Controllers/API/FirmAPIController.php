<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFirmAPIRequest;
use App\Http\Requests\API\UpdateFirmAPIRequest;
use App\Models\Firm;
use App\Repositories\FirmRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FirmController
 * @package App\Http\Controllers\API
 */

class FirmAPIController extends AppBaseController
{
    /** @var  FirmRepository */
    private $firmRepository;

    public function __construct(FirmRepository $firmRepo)
    {
        $this->firmRepository = $firmRepo;
    }

    /**
     * Display a listing of the Firm.
     * GET|HEAD /firms
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $firms = $this->firmRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($firms->toArray(), 'Firms retrieved successfully');
    }

    /**
     * Store a newly created Firm in storage.
     * POST /firms
     *
     * @param CreateFirmAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFirmAPIRequest $request)
    {
        $input = $request->all();

        $firm = $this->firmRepository->create($input);

        return $this->sendResponse($firm->toArray(), 'Firm saved successfully');
    }

    /**
     * Display the specified Firm.
     * GET|HEAD /firms/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Firm $firm */
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            return $this->sendError('Firm not found');
        }

        return $this->sendResponse($firm->toArray(), 'Firm retrieved successfully');
    }

    /**
     * Update the specified Firm in storage.
     * PUT/PATCH /firms/{id}
     *
     * @param int $id
     * @param UpdateFirmAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFirmAPIRequest $request)
    {
        $input = $request->all();

        /** @var Firm $firm */
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            return $this->sendError('Firm not found');
        }

        $firm = $this->firmRepository->update($input, $id);

        return $this->sendResponse($firm->toArray(), 'Firm updated successfully');
    }

    /**
     * Remove the specified Firm from storage.
     * DELETE /firms/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Firm $firm */
        $firm = $this->firmRepository->find($id);

        if (empty($firm)) {
            return $this->sendError('Firm not found');
        }

        $firm->delete();

        return $this->sendSuccess('Firm deleted successfully');
    }
}
