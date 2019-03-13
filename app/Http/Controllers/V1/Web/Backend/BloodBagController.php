<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RequestBlood\RequestBloodRepositoryInterFace;
use App\Repositories\V1\BloodBag\BloodBagRepositoryInterFace;
use App\Http\Requests\BloodBagRequest;

class BloodBagController extends Controller
{
    protected $requestBloodRepository;
    protected $bloodBagRepository;

    public function __construct(
        RequestBloodRepositoryInterFace $requestBloodRepository,
        BloodBagRepositoryInterFace $bloodBagRepository
    ) {
        $this->requestBloodRepository = $requestBloodRepository;
        $this->bloodBagRepository = $bloodBagRepository;
    }

    public function getImport()
    {
        return view('backend.bloodbag.import');
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
