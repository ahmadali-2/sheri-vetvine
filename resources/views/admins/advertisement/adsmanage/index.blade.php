@extends('admins.master')

@section('content')
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                </div>

                <div class="col-sm-6">

                    <a class="btn btn-primary float-right" href="{{ route('ads-manage.create') }}">

                        Add New Advertisement

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

                        <strong class="card-title">Manage Advertisements</strong>

                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Campaign Name</th>

                                    <th scope="col">Ad Name</th>

                                    <th scope="col">Ad Media</th>

                                    <th scope="col">Banner Image Url</th>

                                    <th scope="col">Status</th>

                                    <th scope="col">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($ads as $ad)
                                    <tr>

                                        <td scope="row">{{ $loop->iteration }}</td>

                                        <td>{{ $ad->campaigns->campaign_name }}</td>

                                        <td>{{ $ad->ad_name }}</td>

                                        <td>

                                            <img src="{{ asset('admin/advertisement/' . $ad->ad_media) }}"
                                                style="border-radius:4px;height:60px; width:60px">

                                        </td>

                                        <td>{{ $ad->banner_image_url }}</td>

                                        <td>

                                            @if ($ad->status == 1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif

                                        </td>

                                        <td>



                                            <a href="{{ route('ads-manage.edit', $ad->id) }}">

                                                <i class="fas fa-edit text-primary"></i>

                                            </a>

                                            <a href="javascript:void(0);" class="text-decoration-none"
                                                onclick="deleteRecord('{{ $ad->id }}', '/superadmin/ads-manage/')">

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

    </div>
@endsection
