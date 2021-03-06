<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\WareHouse\WareHouseRepositoryInterface;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterface;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterface;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;
use App\Repositories\V1\District\DistrictRepositoryInterFace;
use App\Repositories\V1\Commune\CommuneRepositoryInterFace;

class WareHouseController extends Controller
{
    protected $repository;
    protected $requestRepository;
    protected $bloodBagRepository;
    protected $diaryRepository;
    protected $cityRepository;

    public function __construct(
        WareHouseRepositoryInterFace $repository,
        RequestBloodRepositoryInterface $requestRepository,
        BloodBagRepositoryInterface $bloodBagRepository,
        DiaryRepositoryInterFace $diaryRepository,
        CityRepositoryInterFace $cityRepository,
        DistrictRepositoryInterFace $districtRepository,
        CommuneRepositoryInterFace $communeRepository
    ) {
        $this->repository = $repository;
        $this->requestRepository = $requestRepository;
        $this->bloodBagRepository = $bloodBagRepository;
        $this->diaryRepository = $diaryRepository;
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->communeRepository = $communeRepository;
    }

    public function index()
    {
        $warehouses = $this->repository->index();
        $cities = $this->cityRepository->getCity();

        return view('backend.warehouses.index', compact('warehouses', 'cities'));
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

        return redirect()->back()->with('success', 'Thêm thành công');
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

        return redirect()->back()->with('success', 'Sữa thành công');
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

        return redirect()->back()->with('success', 'Xóa thành công');
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
        $requestBlood = $this->requestRepository->find($id);
        $bloodBag = $this->bloodBagRepository->find($id2);
        $this->diaryRepository->save($id, $requestBlood->user_id, $bloodBag->id, 'Xuất túi máu');

        return redirect()->route('export-bloods.index')->with('success', 'Xuất túi máu thành công');
    }

    public function getImport()
    {
        $bloodBags = $this->bloodBagRepository->getImport();
        $warehouses = $this->repository->index();

        return view('backend.warehouses.list_import', compact('bloodBags', 'warehouses'));
    }

    public function import($id, Request $request)
    {
        $this->bloodBagRepository->confirmImport($id, $request);

        return redirect()->back()->with('success', 'Nhập kho thành công');
    }

    public function listBloodBag()
    {
        $bloodbags = $this->bloodBagRepository->listBloodBagInWareHouse();

        return view('backend.warehouses.bloodbag', compact('bloodbags'));
    }

    public function detailBloodBag($id)
    {
        $bloodbag = $this->bloodBagRepository->find($id);

        return view('backend.warehouses.bloodbag_detail', compact('bloodbag'));
    }

    public function updateStatus($id, Request $request)
    {
        $this->bloodBagRepository->updateStatus($id, $request);

        return redirect()->route('blood-bags.index')->with('success', 'Cập nhập thành công');
    }

    public function showDistrictInCity(Request $request)
    {
        if ($request->ajax()) {
            $districts = $this->districtRepository->showDistrictInCity($request);

            return response()->json($districts);
        }
    }

    public function showCommuneInDistrict(Request $request)
    {
        if ($request->ajax()) {
            $communes = $this->communeRepository->showCommuneInDistrict($request);

            return response()->json($communes);
        }
    }
}
