@extends('admins.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('news.create') }}">
                        Post News
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
                        <strong class="card-title">News</strong>
                    </div>
                        <div class="card-body">
                           <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">link</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                               <tbody>
                                   @foreach ($news as $new )
                                   <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{$new->news_title}}</td>
                                    <td>{{$new->news_link}}</td>
                                    <td>{{$new->news_description}}</td>
                                    <td> <a href="{{ route('news.edit',$new->id) }}"><i class="fas fa-edit text-primary"></i></a>
                                        <a href="javascript:void(0);" class="text-decoration-none" onclick="deleteRecord('{{$new->id}}', '/superadmin/news/')">
                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                        </a></td>
                                </tr>
                                   @endforeach

                               </tbody>
                           </table>
                </div>
            </div>
        </div>
    </div>
@endsection
