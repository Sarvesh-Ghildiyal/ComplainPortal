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
                    <a href="{{route('complain')}}" class="btn btn-primary">Submit Complain</a>
                    <a href="{{route('feedback')}}" class="btn btn-dark">Submit Remark</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
