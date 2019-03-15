<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterFace;
use App\Repositories\V1\WareHouse\WareHouseRepositoryInterFace;
use App\Http\Requests\BloodBagRequest;

class BloodBagController extends Controller
{
    protected $requestBloodRepository;
    protected $bloodBagRepository;
    protected $wareHouseRepository;

    public function __construct(
        RequestBloodRepositoryInterFace $requestBloodRepository,
        BloodBagRepositoryInterFace $bloodBagRepository,
        WareHouseRepositoryInterFace $wareHouseRepository
    ) {
        $this->requestBloodRepository = $requestBloodRepository;
        $this->bloodBagRepository = $bloodBagRepository;
        $this->wareHouseRepository = $wareHouseRepository;
    }

    public function getImport()
    {
        $warehouses = $this->wareHouseRepository->getWareHouseAsArray();

        return view('backend.bloodbag.import', compact('warehouses'));
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
        $this->bloodBagRepository->store($request);

        return back();
    }
}
