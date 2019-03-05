<!-- Modal -->
<div class="modal fade model-calendar" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content content-modal">
            <div class="modal-header header-calendar">
                <h4 class="modal-title title-modal">Địa điểm hiến máu tháng này</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-boby table-responsive calendar-model">
                <table class="table table-bordered calendar-table">
                    <thead>
                        <tr>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Địa điểm</th>
                            <th scope="col">Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calendars as $key => $calendar)
                        <tr>
                            <td>{{substr($calendar->time, 0, 5)}}</td>
                            <td>{{substr($calendar->time, 6)}}</td>
                            @php
                            $add = $calendar->address . ' - ' . $calendar->commune->name .
                            ' - ' . $calendar->commune->district->name . ' - ' .
                            $calendar->commune->district->city->name
                            @endphp
                            <td>{{ $add }}</td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="#">Đăng kí</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
