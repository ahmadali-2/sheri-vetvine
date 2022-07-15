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
                                <strong class="card-title">Buy Events</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Event Name</th>
                                            <th scope="col">Event Category</th>
                                            <th scope="col">Event Buy Users</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($memberships as $buyevent)

                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$buyevent->event_title ?? ''}}</td>
                                            <td>{{$buyevent->events->category_title ?? ''}}</td>
                                            <td>{{$buyevent->totalUsersInPlans ?? ''}}</td>

                                            <td>
                                            <a href="{{route('buyevent-users.show',$buyevent->id)}}"> <i class="far fa-eye text-info"></i></a>
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
