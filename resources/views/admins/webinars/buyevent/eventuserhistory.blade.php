@extends('admins.master')
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Users Events / History</h1>
                </div>

            </div>
        </div>
    </section>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><b style="color: #f27222;"> {{$userHistory->name }}'s</b> History</strong>
                            </div>
                            <div class="card-body">
                            <div class="row">

		<div class="col-lg-6">
			<h6> Information</h6>
			<p> <b>Name :</b></p>
			<p> <b>Email :</b></p>
			<p> <b>Network :</b></p>
			<p> <b>User Type :</b></p>
			<p> <b>Profession :</b></p>
			<p> <b>TimeZone :</b></p>
            <p> <b>Account Created :</b></p>
			<p> <b>Last Login :</b></p>
			<p> <b>Creation IP Address :</b></p>
			<p> <b>Last Login IP Address :</b></p>
			<p> <b>Event Fee :</b></p>
			<p> <b>Registered By :</b></p>
			<p> <b>Status :</b></p>



		</div>
		<div class="col-lg-6">
			<h6> Detail</h6>
			<p> <b>{{$userHistory->name}}</b></p>
			<p> <b>{{$userHistory->email}}</b></p>
			<p> <b>{{vetvineHelper::networkName($userHistory->userNetworkLevel->parent_id)}}</b></p>
			<p> <b>{{$userHistory->userMemberType->member_type ?? ''}}</b></p>
			<p> <b>{{$userHistory->userNetworkLevel->name}}</b></p>
            <p> <b>{{$userHistory->timezone->name ?? 'Null'}}</b></p>
            <p><b>{{ date('M-d-Y', strtotime($userHistory->created_at))}}</b></p>
            <p><b>{{ date('M-d-Y', strtotime($userHistory->last_login_date))}}</b></p>
            <p> <b>{{$userHistory->creation_ip ?? 'Null'}}</b></p>
            <p> <b>{{$userHistory->last_login_ip ?? 'Null'}}</b></p>
            <p> <b>{{$userHistory->buyevents->amount ?? 'Null'}}</b></p>
            <p> <b>{{$userHistory->provider ?? 'Manually'}}</b></p>

			<p>
                @if($userHistory->status == 1)
                <span class="badge badge-pill badge-success">Active</span>
                @else
                <span class="badge badge-pill badge-danger">In Active</span>
                @endif

            </p>

		</div>
		</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
