@extends('backend.layouts.app')
@section('content')
<div class="">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    {{$user->information->name}}
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-sm-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Chức vụ:</td>
                                        <td>
                                        {{ ($user->role == 1) ? 'Administrator' : (($user->role == 2) ? 'Staff' : '') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username:</td>
                                        <td>
                                        {{ $user->username}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CMND:</td>
                                        <td>
                                        {{ $user->information->cmnd}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td>
                                        {{ $user->information->dob }}
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        <td>
                                        {{ $user->information->gender == 1 ? "Male" : "Female"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ nhà</td>
                                        <td>
                                        {{ $user->information->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail</td>
                                        <td><a
                                                href="mailto:{{$user->email}}">
                                                {{$user->email}}
                                                </a>
                                        </td>
                                    </tr>
                                    <td>Số điện thoại</td>
                                    <td>
                                    {{$user->information->phone}}
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">Thay đổi mật khẩu</a>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
