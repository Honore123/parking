@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            @include('layouts.partials.notification')
        </div>
    </div>
    <div class="row justify-content-between" id="parkingMenu">

    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            setInterval(function () {

                $('#parkingMenu').load('/parking');
            }, 1000)
        })
    </script>
@endpush
