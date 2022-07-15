@extends('admins.master')
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subscribed Users / Plans</h1>
                </div>

            </div>
        </div>
    </section>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Subscribed Users of <b style="color: #f27222;"> {{$membership->plan_name}} </b>Plan</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"> Price</th>
                                            <th scope="col">Expiry</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($membership->buymemberships as $plans)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$plans->user->email}}</td>
                                            <td>{{$membership->plan_price . '.00' ?? ''}}</td>
                                            <td>{{$membership->expiry_date}}</td>

                                            <td>
                                            <a href="{{route('userhistory',$plans->user->id)}}"> <i class="far fa-eye text-info"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
