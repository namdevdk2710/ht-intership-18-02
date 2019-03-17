<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\WareHouse\WareHouseRepositoryInterface;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterface;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterface;

class WareHouseController extends Controller
{
    protected $repository;
    protected $requestRepository;
    protected $bloodBagRepository;

    public function __construct(
        WareHouseRepositoryInterFace $repository,
        RequestBloodRepositoryInterface $requestRepository,
        BloodBagRepositoryInterface $bloodBagRepository
    ) {
        $this->repository = $repository;
        $this->requestRepository = $requestRepository;
        $this->bloodBagRepository = $bloodBagRepository;
    }

    public function index()
    {
        $warehouses = $this->repository->index();

        return view('backend.warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->store($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($id, $request);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);

        return redirect()->back();
    }

    public function getExport()
    {
        $requestBloods = $this->requestRepository->receivedByStatus();

        return view('backend.warehouses.list_export', compact('requestBloods'));
    }

    public function getExportRequest($id)
    {
        $requests = $this->requestRepository->find($id);
        $bloodbags = $this->bloodBagRepository->getBloodBagByStatus();

        return view('backend.warehouses.export_request', compact('requests', 'bloodbags'));
    }

    public function confirm($id, $id2)
    {
        $this->bloodBagRepository->confirm($id2);
        $this->requestRepository->confirm($id);

        return redirect()->route('export-bloods.index');
    }

    public function getImport()
    {
        $bloodBags = $this->bloodBagRepository->getImport();

        return view('backend.warehouses.list_import', compact('bloodBags'));
    }
}
