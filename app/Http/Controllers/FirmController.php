<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFirmRequest;
use App\Http\Requests\UpdateFirmRequest;
use App\Repositories\FirmRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
        $firms = $this->firmRepository->paginate(20);

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

        if (empty($firm)) {
            Flash::error('Firm not found');

            return redirect(route('firms.index'));
        }

        return view('firms.edit')->with('firm', $firm);
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
}
