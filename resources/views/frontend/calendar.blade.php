<!-- Modal -->
<div class="modal fade model-calendar" id="calendarModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-calendar">
                <h4 class="modal-title titles-modal">Địa điểm hiến máu tháng này</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-boby calendar-model">
                <table class="table table-bordered calendars-table">
                    <thead>
                        <tr class="d-flex justify-content-between text-center">
                            <th scope="col" class="col-sm-2">Thời gian</th>
                            <th scope="col" class="col-sm-2">Ngày</th>
                            <th scope="col" class="col-sm-6">Địa điểm</th>
                            <th scope="col" class="col-sm-2">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calendars as $key => $calendar)
                        <tr class="d-flex justify-content-between text-center">
                            <td class="col-sm-2">{{substr($calendar->time, 0, 5)}}</td>
                            <td class="col-sm-2">{{substr($calendar->time, 6)}}</td>
                            @php
                            $add = $calendar->address . ' - ' . $calendar->commune->name .
                            ' - ' . $calendar->commune->district->name . ' - ' .
                            $calendar->commune->district->city->name
                            @endphp
                            <td class="col-sm-6">{{ $add }}</td>
                            <td class="col-sm-2">
                                <a class="btn btn-sm btn-danger" href="#">Đăng kí</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-wrapper">
                {{ $calendars->links() }}
            </div>
        </div>
    </div>
</div>
