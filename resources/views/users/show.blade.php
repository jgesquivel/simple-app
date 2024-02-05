@extends('layout.layout')
@section('content')
        <div class="row">
            <div class="col-3"></div>
            <div class="col-10">
                @include('shared.success-message')
                <hr>
                    <div class="mt-3">
                        @include('shared.user-card')
                    </div>

            </div>
            <div class="col-3"></div>
        </div>
@endsection