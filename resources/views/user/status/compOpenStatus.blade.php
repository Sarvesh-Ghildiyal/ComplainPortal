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
                       
                        <a href="{{route('compStatusIndex')}}">back</a>
                        
                        @php $open=0; @endphp
                        @foreach($complains as $comp)
                            @if($status==$comp->complain_status)
                                @php $open=1; @endphp
                            @endif
                        @endforeach

                        {{-- Main index view for the complains --}}
                        @if($open)
                           <table class="table table-striped">

                                {{-- table head --}}
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Dpt</th>
                                        <th scope="col">Room_no</th>
                                        <th scope="col">Des</th>
                                    </tr>
                                </thead>


                                {{-- table body --}}
                                <tbody>
                                      
                                    @foreach($complains as $comp)
                                        @if($uid==$comp->user_id)

                                            <tr>
                                                <th scope="row">{{$open}}</th>
                                                <td>{{$comp->department}}</td>
                                                <td>{{$comp->room_no}}</td>
                                                <td>{{$comp->description}}</td>
                                            </tr>
                                            @php $open+=1; @endphp
                                       
                                         @endif
                                    @endforeach
                                  
                                </tbody>
                           </table>
                        @else
                           All the complains have been closed.
                            {{-- {{action([App\Http\Controllers\ComplainController::class,])}} --}}
                           {{-- {{route('noComplain')}} --}}
                           
                         @endif
                    </div>
                </div>
            </div>   
@endsection