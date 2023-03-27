@extends('layouts.layout')

@section('pageCss')
<link rel="stylesheet" href="/css/top.css">
<link rel="stylesheet" href="/css/form.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.2/jquery.typeahead.css"
        integrity="sha512-zPDjm5fHC6JUi5jEnhJetvp1zLvc1Dd5TuMFQQtqRH0KpOzrng4vHiFu2Eva+Xgu7umz0lqGHkmGjUYdeSW54w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.2/jquery.typeahead.js"
        integrity="sha512-8+3AF+qMeZ3HSeKKru1YD5pFbXnIxUvMH1UsK8sKbHwbj5ZixBtDP+8oMMkBeaZc8TIIOjHnxN++zCPhHWCrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
  @php
  $months = range(1,12);
  $days = range(1,31); 
  @endphp
<div id="contents">
  <h2 class="text-center mb-4">Edit</h2>
  <div class="d-flex col-12 ">

    <div class="col-12">
      <div class="box_con03">
        <div>
          <p>{{ $character->id }}</p>
          <p>{{ $character->name }}</p>
          <p>{{ $character->ruby }}</p>
          <p>{{ $character->title }}</p>
          <p>{{ $character->month }}</p>
          <p>{{ $character->day }}</p>
          <p>{{ $character->gender }}</p>
          <p>{{ $character->blood }}</p>
        </div>
 
        <form method="POST" action="/destroy/character" id="myForm">
          @csrf
          <input type="hidden" value={{$character->id}} name="character_id">
         
          <div>
            <p class="btn mx-auto">
                <span><input type="submit" value="削除"></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>


</div>
@endsection