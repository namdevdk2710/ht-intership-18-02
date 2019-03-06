<?php

namespace App\Repositories\V1\Calendar;

use App\Repositories\BaseRepository;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;

class CalendarRepository extends BaseRepository implements CalendarRepositoryInterface
{
    public function getModel()
    {
        return Calendar::class;
    }

    public function listCalendar()
    {
        return $this->model->paginate(5);
    }

    public function store($data)
    {
        return $this->model->create([
            'user_id' => Auth::id(),
            'time' => $data['date'] . ' ' . $data['time'],
            'commune_id' => $data['commune'],
            'address' => $data['address'],
        ]);
    }

    public function update($id, $request)
    {
        $calendar = $this->model->find($id);
        $calendar->time = date('Y-m-d H:i:s', strtotime($request->input('time') . ' ' . $request->input('date')));
        $calendar->user_id =  Auth::id();
        $calendar->commune_id = $request->input('commune');
        $calendar->address = $request->input('address');

        return $calendar->save();
    }
}
