@extends('layout')
@extends('header')
@section('content')

<div class="container">
    <form action="/save-note" method="POST">
        @csrf
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="enter title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Enter note</label>
            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
        </div>
        <button type="sybmit" class="btn btn-success">Success</button>
    </form>

</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif
@endsection