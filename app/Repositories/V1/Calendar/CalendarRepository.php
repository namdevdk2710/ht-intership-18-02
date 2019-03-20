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

    public function listCalendar($num)
    {
        return $this->model->paginate($num);
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

    public function getDashboardData()
    {
        return $this->model->where('time', '>', now())
                    ->orderBy('time', 'asc')
                    ->get();
    }

    public function getFutureCalendar($num)
    {
        return $this->model->where('time', '>', now())
                    ->orderBy('time', 'asc')
                    ->paginate($num);
    }
}
