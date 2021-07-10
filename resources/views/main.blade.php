@extends('layout')
@extends('header')
@section('content')
<br>
<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white container" style="width: 100%;">
  <a href="/create-note" class="btn btn-info" style="width: 150px;">

    <span class="fs-5 fw-semibold">Add note</span>
  </a>
  <div class="list-group list-group-flush border-bottom scrollarea">
    <br>

    @if( empty($notes) )
    <div class="h5">Note list is empty. Press add note! </div>
    @endif

    @foreach($notes as $note)
    <a href="/edit-note/{{$note->id}}" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
      <div class="d-flex w-100 align-items-center justify-content-between">
        <strong class="mb-1">{{$note->title}}</strong>
      </div>
      <div class="col-10 mb-1 small">{{$note->text}}</div>
    </a>
    @endforeach

  </div>
</div>

@endsection