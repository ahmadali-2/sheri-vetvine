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
                                <strong class="card-title">Subscribed Plans</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Plan Name</th>
                                            <th scope="col">Plan Category</th>
                                            <th scope="col">Subscribed Users</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($memberships as $plans)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$plans->plan_name ?? ''}}</td>
                                            <td>{{$plans->plancategory->category_name ?? ''}}</td>
                                            <td>{{$plans->totalUsersInPlans ?? ''}}</td>
                                           
                                            <td>
                                            <a href="{{route('subscribed-users.show',$plans->id)}}"> <i class="far fa-eye text-info"></i></a>
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
