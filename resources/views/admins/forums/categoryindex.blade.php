@extends('admins.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('forums.create') }}">
                        Add Category & Forum
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
                        <strong class="card-title">Manage Forums Category</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Category Name</th>

                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $category->category_title }}</td>
                                        <td> <a href="{{ route('forums-category.edit', $category->id) }}"><i
                                                    class="fas fa-edit text-primary"></i></a>
                                            <a href="javascript:void(0);" class="text-decoration-none"
                                                onclick="deleteRecord('{{ $category->id }}', '/superadmin/forums-category/')">
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
