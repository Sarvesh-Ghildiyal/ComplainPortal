@extends('layouts.app')
@section('content')
     
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
            
            {{-- Header Section of the form --}}            
                        <header class="mt-2">
                            <div class="row">
                            <div class="col-4 college_logo"><img src="/logo2.png" alt="College Logo" class="img-fluid w-50 "></div>
                            <div class="col-8 college_name">THDC_Institute of Hydropower Engineering & Technology, Tehri</div>
                        </div>
                        </header>
    
                    <div class="card-header mt-3"><h3>Complain Form</h3></div>
{{--             
                    @if($errors)
                    @foreach($errors->all() as $error)
                      <p class="text-danger">{{$error}}</p>
                    @endforeach
                    @endif --}}
                        
                    
            {{-- Main form --}}
                {{-- SUBMIT COMPLAIN FORM --}}
                            
                    {{-- <h3 class="col-12">Complain Form</h3> --}}
                    <!-- Proper form -->
                    <form  id="complain_form" class="col-12" method="Post" action="{{route('complain.store')}}">
                    
                
                            @csrf
                            <div class="row complain_form">
                                <div class="col-md-6 mt-2">
                                    <label for="department">Department:</label>
                                    <input type="text" id="department" name="department" class="form-control" placeholder="eg:CSE" pattern="^[A-Za-z ]+$" required>
                                </div>
                                
                                <div class="col-md-6 mt-2">
                                    <label for="room_no">Room Number:</label>
                                    <input type="text" id="room_no" name="room_no" class="form-control" placeholder="eg:205" pattern="[0-9]+" required>
                                </div>
                    
                                <div class="col-md-6 mt-4">
                                    <label for="reported_by">Reported By:</label>
                                    <input type="text" id="reported_by" name="reported_by" class="form-control" value='{{$user_name}}' placeholder="eg:Aleva" pattern="^[A-Za-z ]+$" reaquired>
                                </div>
                                
                                <div class="col-md-6 mt-4">
                                    <label for="requested_by">Requested By:</label>
                                    <input type="text" id="requested_by" name="requested_by" class="form-control" placeholder="eg:Ganel" pattern="^[A-Za-z ]+$" required>
                                </div>
                    
                                <div class="col-md-12 mt-4">
                                    <label for="description" class="form-label">Problem:</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" pattern="^[A-Za-z ]+$"required></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 d-flex justify-content-center">Submit</button>
                    </form>
                 </div>
            </div>
                    
            </div>
        </div>
       
    </div>
@endsection