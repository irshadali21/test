<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaVelinaClusterRequest;
use App\Http\Requests\UpdateLaVelinaClusterRequest;
use App\Repositories\LaVelinaClusterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
        return view('la_velina_clusters.create');
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

        return view('la_velina_clusters.show')->with('laVelinaCluster', $laVelinaCluster);
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
}
