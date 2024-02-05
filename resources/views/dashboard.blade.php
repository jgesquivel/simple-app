@extends('layout.layout')

@section('content')

        <div class="row">
            <div class="col-3"></div>
            
            <div class="col-6">
                @guest()
                <h1>LOGIN TO POST IDEAS</h1>
                @endguest
                @auth()
                @include('shared.success-message')
                @include('shared.submit-idea')
                @endauth
                <hr>
                
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea-card')
                    </div>
                @endforeach
                
                <div class="mt-5">
                {{ $ideas->links() }}
                </div>
            </div>
            
            <div class="col-3"></div>
        </div>

@endsection