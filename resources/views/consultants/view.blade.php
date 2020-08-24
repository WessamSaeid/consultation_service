@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <img src="/storage/{{ $consultant->profile_picture}}" class="card-img-top" alt="..." height="300px">
        <div class="card-body">
            <h5 class="card-title">{{ $consultant->name}}</h5>
            <p class="card-text">{{ $consultant->bio}}</p>
        </div>


        <div>
        
        </div>
    </div>
</div>

@endsection