@extends('admins.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('webinars.create') }}">
                            Add New Event/Webinar
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
                        <strong class="card-title">Manage Events</strong>
                    </div>
                        <div class="card-body">
                           <table class="table">
                               <thead>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Media</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event as $events)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $events->event_title }}</td>
                                            <td>{{ $events->tags }}</td>
                                            <td>{{ $events->events->category_title }}</td>
                                            <td>
                                                <img src="{{ asset('admin/eventss/' . $events->main_photo) }}"
                                                    style="border-radius:4px;height:60px; width:60px">
                                            </td>
                                            <td>{{ Str::limit($events->event_description , 150) }}</td>
                                            <td>
                                                <a href="{{ route('webinars.edit', $events->id) }}">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="text-decoration-none"
                                                    onclick="deleteRecord('{{ $events->id }}', '/superadmin/webinars/')">
                                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               </thead>
                           </table>
                </div>
            </div>
        </div>
    </div>
@endsection
