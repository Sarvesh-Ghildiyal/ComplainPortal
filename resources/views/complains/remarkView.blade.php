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
                    
            {{-- {{$complains}}; --}}
            <table class="table">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Dpt</th>
                    <th scope="col">Room_no</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                     @if(count($complains)>0)
                    {{-- @dd(count($complains)) --}}
                    {{-- @dd($uid); --}}                        
                            @php $count=1; @endphp
                            @foreach($complains as $comp)
                                @if($uid==$comp->user_id)
                                    
                                <tr>
                                    <th scope="row">{{$count}}</th>
                                    <td>{{$comp->department}}</td>
                                    <td>{{$comp->room_no}}</td>
                                    <td>{{$comp->description}}</td>
                                    <td><a href={{route('complains.edit',$comp->id)}} class="btn btn-primary">Edit</a></td>
                                    <td><a href={{route('complains.destroy',$comp->id)}} class="btn btn-danger">Delete</a></td>
                                    @php $count+=1; @endphp
                                </tr>
                                @endif
                            @endforeach
                            
                    @else
                    <h3>There are no complains at the moment.</h3>
                    @endif
                </tbody>
              </table>
                 </div>
            </div>
                    
            </div>
        </div>
       
    </div>
@endsection