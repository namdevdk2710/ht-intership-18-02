<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterFace;
use App\Repositories\V1\WareHouse\WareHouseRepositoryInterFace;
use App\Repositories\V1\Diary\DiaryRepositoryInterFace;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterFace;
use App\Repositories\V1\Information\InformationRepositoryInterFace;
use App\Http\Requests\BloodBagRequest;

class BloodBagController extends Controller
{
    protected $requestBloodRepository;
    protected $bloodBagRepository;
    protected $wareHouseRepository;
    protected $diaryRepository;
    protected $bloodGroupRepository;
    protected $informationRepository;

    public function __construct(
        RequestBloodRepositoryInterFace $requestBloodRepository,
        BloodBagRepositoryInterFace $bloodBagRepository,
        WareHouseRepositoryInterFace $wareHouseRepository,
        DiaryRepositoryInterFace $diaryRepository,
        BloodGroupRepositoryInterFace $bloodGroupRepository,
        InformationRepositoryInterFace $informationRepository
    ) {
        $this->requestBloodRepository = $requestBloodRepository;
        $this->bloodBagRepository = $bloodBagRepository;
        $this->wareHouseRepository = $wareHouseRepository;
        $this->diaryRepository = $diaryRepository;
        $this->bloodGroupRepository = $bloodGroupRepository;
        $this->informationRepository = $informationRepository;
    }

    public function getImport()
    {
        $warehouses = $this->wareHouseRepository->getWareHouseAsArray();
        $bloodGroups = $this->bloodGroupRepository->index();

        return view('backend.bloodbag.import', compact('warehouses', 'bloodGroups'));
    }

    public function getInfoByCode(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->requestBloodRepository->getById($request->request_id);

            return response()->json($data);
        }
    }

    public function store(BloodBagRequest $request)
    {
        $bloodBag = $this->bloodBagRepository->store($request);
        $userId = $bloodBag->requestBlood->user_id;
        $this->informationRepository->updateBloodGroup($request, $userId);
        $this->diaryRepository->save(
            $request->input('request_blood_id'),
            $bloodBag->requestBlood->user_id,
            $bloodBag->id,
            'Nhập túi máu'
        );

        return back()->with('success', 'Nhập túi máu thành công');
    }

    public function getSearch()
    {
        return view('backend.bloodbag.search');
    }

    public function searchBloodBagByCode(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->requestBloodRepository->getById($request->request_id);
            $data += $this->bloodBagRepository->getResultByRequestId($request->request_id);

            return response()->json($data);
        }
    }
}
