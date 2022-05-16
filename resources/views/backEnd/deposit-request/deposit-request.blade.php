@extends('frontEnd.admin-dashboard')
@section('title') Deposit Request @endsection
@section('mainContent')

    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Deposit Request List</h1>
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="user-profile-details">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Payment Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Image</th>
                        <th scope="col">Reference Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$deposit->user->name}}</td>
                            <td>{{$deposit->payment_type}}</td>
                            <td>{{$deposit->amount}}</td>
                            @if($deposit->bank_attachment != null)
                                <td><img width="40px" id="bank_slip" src="{{asset('public/'.$deposit->bank_attachment)}}"/></td>
                            @elseif($deposit->beftn_attachment != Null)
                                <td><img width="40px" id="bank_slip" src="{{asset('public/'.$deposit->beftn_attachment)}}"/></td>
                            @else
                            <td><img width="40px" id="bank_slip" src="../public/images/no_image.png"/></td>
                            @endif
                            <td>{{$deposit->online_referance}}</td>
                            <td>{{$deposit->status == 1 ? 'Approved' : 'Pending'}}</td>
                            <td>
                                <a href="{{URL::to('/admin/client-deposit-request-approved/'.$deposit->id)}}" onclick="return confirm('Are you sure ?? you want to approved this request !!')" class="btn btn-success">Approved</a>
                                @if($deposit->bank_attachment != null)
                                    <a target="_blank" href="{{URL::to(asset('public/'.$deposit->bank_attachment))}}"  class="btn btn-info">View</a>
                                @elseif($deposit->beftn_attachment != Null)
                                    <a target="_blank" href="{{URL::to(asset('public/'.$deposit->beftn_attachment))}}"  class="btn btn-info">View</a>
                                @else

                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div style="text-align: center;">
                {{$deposits->links()}}
            </div>
        </div>
    </div>


@endsection
