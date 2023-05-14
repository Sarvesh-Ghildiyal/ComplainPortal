@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
      <div class="card">
            <div class="card-header">Dashboard, {{$user->name}}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- {{ __('You are logged in') }} --}}
                <strong>You are in, {{$user->name}}</strong>

                <div class="d-flex justify-content-around mt-5">
                   
                     <a href="{{route('complain.create')}}" class="btn btn-primary">Fill Complain</a>
                    <a href="{{route('compEditIndex')}}" class="btn btn-secondary">Edit Complain</a>

                     {{-- complain.index pe jaa rha tha phle ye upar vala route --}}
                    <a href="{{route('compViewIndex')}}" class="btn btn-dark">View</a>
                    <a href="{{route('compStatusIndex')}}" class="btn btn-info">Status</a>
                
                    <a href="#" class="btn btn-secondary">Remark</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
