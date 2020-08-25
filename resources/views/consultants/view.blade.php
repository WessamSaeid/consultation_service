@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <img src="/storage/{{ $consultant->profile_picture}}" class="card-img-top" alt="..." >
        <div class="card-body">
            <h5 class="card-title">{{ $consultant->name}}</h5>
            <p class="card-text">{{ $consultant->bio}}</p>
        </div>


        <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#request-modal">
  request consultation
</button>
        </div>
    </div>
</div>

<!-- Request consultation MODAL -->
<div class="modal fade" id="request-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Request consultation</h4>
            </div>
            <form method="POST" action="{{ route('consultants.request', $consultant->id) }}">
                @csrf
                <div class="modal-body pt-3 pr-4 pl-4">

                    <div class="form-group ">
                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>

                    <div class="form-group ">
                        <label for="email" class="col-form-label text-md-right">{{ __('Email') }}</label>

                        <input id="email" type="email" class="form-control" name="email" required autofocus>
                    </div>
                </div>
                <div class="text-right pb-4 pr-4">
                    <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success save-event  ">Submit consultation request</button>
                </div>
            </form>
        </div> <!-- end modal-content-->
    </div> <!-- end modal dialog-->
</div>
<!-- end modal-->

@endsection