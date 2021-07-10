@extends('layout')
@extends('header')

@section('content')
<div class="container d-flex flex-row">

    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 fw-semibold">All users</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
            @foreach($users as $user)
            <a href="/adminpanel/loadNote/{{ $user->id }}" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">{{ $user->username }}</strong>
                    <small>
                        @if($user->isAdmin)
                        User is Admin
                        @else
                        <form class="text-end" method="POST" action="/delete-user/{{ $user->id }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Del</button>
                        </form>
                        @endif
                    </small>
                </div>
                <div class="col-10 mb-1 small">{{$user->created_at}}</div>
            </a>
            @endforeach
        </div>
    </div>
    <div style="width: 50px;"></div>
   
    @if(isset($notes))
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">

        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 fw-semibold">User notes</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
            
            @foreach($notes as $note)
            <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">{{$note->title}}</strong>
                    <small>{{ $note->updated_at }}</small>
                </div>
                <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
            </a>
            @endforeach
            
        </div>
    </div>
    @endif

</div>
@endsection