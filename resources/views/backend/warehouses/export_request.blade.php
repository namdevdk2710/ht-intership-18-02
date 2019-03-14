@extends('backend.layouts.app')

@section('content')

<div class="request-blood table-responsive">
    <div class="request-blood-header">
        <span class="text-center text-uppercase">
            Xuất túi máu
        </span>
    </div>
    <table class="table">
        <tbody>
            <div>
                @include('backend.warehouses.information_reciver')
            </div>
            <div>
                @include('backend.warehouses.list_blood')
            </div>
        </tbody>
    </table>
    <div class="pagination-wrapper">

    </div>
</div>

@endsection
