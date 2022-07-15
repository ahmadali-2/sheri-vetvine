@extends('vetvineUsers.dashboard_master')
@section('dashboardcontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('post.create') }}">
                    Create New Post
                </a>
            </div>
        </div>
    </div>
</section>

            <div class="card">
             
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Links</th>
                                {{-- <th scope="col">Status</th> --}}
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $post->post_title }}</td>
                                <td>{{ $post->post_description }}</td>
                                <td>
                                    <img src="{{ asset('vetvineUsers/posts/' . $post->post_photo) }}" style="border-radius:4px;height:60px; width:60px">
                                </td>
                                <td>{{ $post->post_link }}</td>
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }}"><i class="fas fa-edit text-primary"></i></a>
                                    <a href=""> <i class="far fa-eye text-info"></i></a>
                                    <a href="javascript:void(0);" class="text-decoration-none" onclick="deleteRecord('{{ $post->id }}', '/vetvine-member/post/')">
                                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
      
    @endsection