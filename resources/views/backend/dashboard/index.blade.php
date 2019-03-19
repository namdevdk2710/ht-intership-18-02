@extends('backend.layouts.app')
@section('content')
    @include('backend.dashboard.general')
    <div class="class="agil-info-calendar"">
        @include('backend.dashboard.request_blood')
        @include('backend.dashboard.diary')
    </div>
@endsection
