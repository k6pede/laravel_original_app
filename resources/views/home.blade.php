@extends('layouts.layout')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
@endsection

@section('content')
<div id="contents">

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
    
                    <div class="card-body mb-2 mt-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('ログインしました！') }}
                    </div>
                    {{-- <div>                            
                        <button><a href="/">button</a></button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
