@extends('admins.master')
@section('content')
<section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 </div>
             </div>
         </div>
     </section>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Member Type Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No #</th>
                                            <th scope="col">Member Type</th>
                                            <th scope="col">Members</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                   @forelse($membertype as $mt)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$mt->member_type ?? '' }}</td>
                                            <td>{{$mt->userTypeCheck->count() ?? '0'}}</td>
                                            <td>
                                                @if ($mt->member_type === 1)

                                                @else

                                                <a href="{{route('memberpermissions', $mt->id)}}"><i class="fas fa-edit text-primary"></i></a>
                                                </a>
                                                @endif

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
