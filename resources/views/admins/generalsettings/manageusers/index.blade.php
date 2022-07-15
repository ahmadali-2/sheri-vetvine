@extends('admins.master')
@section('content')
<section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 </div>
                 <div class="col-sm-6">
                     <a class="btn btn-primary float-right" href="{{route('unapproved')}}">
                       New User Requests ({{$allUsers->where('status',0)->count()}})
                     </a>
                 </div>
             </div>
         </div>
     </section>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table" style="width: 100%;">
                                <colgroup>
                                    <col span="1" style="width: 5%;">
                                    <col span="1" style="width: 10%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 0%;">
                                </colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col">No #</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Network</th>
                                            <th scope="col">User Type</th>
                                            <th scope="col">Verification Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                   @forelse($allUsers->where('status',1) as $approveuser)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$approveuser->name ?? '' }}</td>
                                            <td>{{$approveuser->email ?? ''}}</td>
                                            <td>{{$approveuser->userNetworkLevel->name}}</td>
                                            <td>{{$approveuser->userMemberType->member_type}}</td>
                                            @if(isset($approveuser->email_verified_at))
                                                <td><span class="badge badge-pill badge-success">Verified</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-primary">Pending</span></td>
                                            @endif
                                            <td>
                                            <a href="{{route('changeusertype',$approveuser->id )}}"><i class="fas fa-edit text-primary"></i></a>
                                            <a href="{{route('userhistory', $approveuser->id)}}"> <i class="far fa-eye text-info"></i></a>
                                            <a href="javascript:void(0);" class="text-decoration-none" onclick="deleteRecord('{{$approveuser->id}}', '/superadmin/manageuser/')">
                                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                            </a>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>No Record Found</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
