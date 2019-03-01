<?php

namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\BloodGroup\BloodGroupRepositoryInterface;

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

    public function store(Request $request)
    {
        $this->bloodRepository->store($request->all());

        return redirect()->route('bloods.list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->bloodRepository->update($id, $request->all());

        return redirect()->route('bloods.list')->with('success', 'Successfull!');
    }

    public function destroy($id)
    {
        $this->bloodRepository->destroy($id);

        return redirect()->route('bloods.list')->with('success', 'Xóa thành công');
    }
}
