@extends('backend.layouts.app')

@section('content')

<div class="request-blood table-responsive">
    <div class="request-blood-header">
        <h3 class="text-center text-uppercase">
            Xuất túi máu
        </h3>
    </div>
    <table class="table">
        <tbody>
            <div>
                @include('backend.warehouses.information_reciver')
                @include('backend.warehouses.list_blood')
            </div>
        </tbody>
    </table>
    <div class="pagination-wrapper">

    </div>
</div>

@endsection
