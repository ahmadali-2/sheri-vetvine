@extends('admins.master')
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buy Events / Users</h1>
                </div>

            </div>
        </div>
    </section>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Buy Users <b style="color: #f27222;">{{$membership->event_title}}</b> Event</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Event Price</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($membership->buyeventplan as $plans)

                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$plans->user->name}}</td>
                                            <td>{{$plans->user->email}}</td>
                                            <td>${{$plans->amount . '.00' ?? ''}}</td>
                                            <td>{{date('M-d-Y', strtotime($plans->created_at))}}</td>
                                            <td>
                                            <a href="{{route('usereventhistory',$plans->user->id)}}"> <i class="far fa-eye text-info"></i></a>
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
