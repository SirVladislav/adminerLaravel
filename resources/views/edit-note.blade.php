@extends('layout')
@extends('header')
@section('content')
<br>
<div class="container ">
    <div>
        <form action="/edit-note/{{ $note->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="enter title" value="{{$note->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Enter note</label>
                <textarea style="height: 300px;" class="form-control" id="text" name="text" rows="3">{{$note->text}}</textarea>
            </div>
            <button type="sybmit" class="btn btn-success">Update</button>
        </form>
    </div>
    
    <div class='d-flex justify-content-center'>
        <form action="/delete-note/{{$note->id}}" method="POST">
            @csrf
            <button type="sybmit" class="btn btn-danger">Delete</button>
        </form>
    </div>

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