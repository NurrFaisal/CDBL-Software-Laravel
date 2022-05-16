@extends('frontEnd.client-dashboard')
@section('title') Apply IPO @endsection
@section('mainContent')

    <div class="bo-container">
        <h1 class="profile-heading">Apply IPO</h1>
        @include('frontEnd.includes.balance-info')
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="user-profile-details">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Company Name</th>
                    <th scope="col">IPO Name</th>
                    <th scope="col">Lot Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ipos as $ipo)
                <tr>
                    <td>{{$ipo->company_name}}</td>
                    <td>{{$ipo->ipo_name}}</td>
                    <td>{{$ipo->lot_size}}</td>
                    <td>{{$ipo->price}}</td>
                    <td>{{$ipo->start_date}}</td>
                    <td>{{$ipo->end_date}}</td>
                    <td>{{$ipo->lot_size * $ipo->price}}</td>
                    <td>
                        <a href="#"><button class="btn btn-default">Preview</button></a>
                        @if(in_array($ipo->id, $apply_ipo_array))
                        <a href="#" onclick="alert('You Already Applied')"><button  class="btn btn-default">Applied</button></a>
                        @else
                            <a href="{{URL::to('/client/ipo-apply-submit/'.$ipo->id)}}" onclick="return confirm('Are your sure ?? you want to apply this IPO')"><button class="btn btn-primary">Apply</button></a>
                            @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{$ipos->links()}}
        </div>
    </div>

@endsection
