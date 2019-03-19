<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterface;
use App\Http\Requests\BloodGroupRequest;

class BloodController extends Controller
{
    protected $bloodRepository;

    public function __construct(BloodGroupRepositoryInterface $bloodRepository)
    {
        $this->bloodRepository = $bloodRepository;
    }

    public function index()
    {
        $bloods = $this->bloodRepository->index();

        return view('backend.bloodgroup.index', compact('bloods'));
    }

    public function store(BloodGroupRequest $request)
    {
        $this->bloodRepository->store($request->all());

        return redirect()->route('bloods.list')->with('success', 'Thêm thành công');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(BloodGroupRequest $request, $id)
    {
        $this->bloodRepository->update($id, $request->all());

        return redirect()->route('bloods.list')->with('success', 'Chỉnh sửa thành công');
    }

    public function destroy($id)
    {
        $this->bloodRepository->destroy($id);

        return redirect()->route('bloods.list')->with('success', 'Xóa thành công');
    }
}
