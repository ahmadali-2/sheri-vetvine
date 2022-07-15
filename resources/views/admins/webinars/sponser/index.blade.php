@extends('admins.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('sponsors.create') }}">
                        Add Sponsor
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
                        <strong class="card-title">Sponsors</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sponser as $sponsers)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $sponsers->sponser_name }}</td>
                                        <td>{{ $sponsers->sponser_link }}</td>
                                        <td>
                                            <img src="{{ asset('admin/eventss/' . $sponsers->sponser_image) }}"
                                                style="border-radius:4px;height:60px; width:60px">
                                        </td>
                                        <td>
                                            <a href="{{ route('sponsors.edit', $sponsers->id) }}"><i
                                                    class="fas fa-edit text-primary"></i></a>
                                            <a href="javascript:void(0);" class="text-decoration-none"
                                                onclick="deleteRecord('{{ $sponsers->id }}', '/superadmin/sponsors/')">
                                                <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
