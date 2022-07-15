@extends('admins.master')
@section('content')
<style>
    .table tr td:not(:nth-child(1) , :nth-child(2), :last-child) {
        text-align: center;
       width: 35%;
       word-break: break-all;
       text-align: left;
    }
    .table tr td:last-child {
        width: 10%;
    }
    /* @media (max-width: 1200px){
        .card-body {
    padding: 15px;
    overflow-x: scroll !important;
}
    } */

</style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('videos-on-demand.create') }}">
                        Post Videos
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
                        <strong class="card-title">Videos</strong>
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
                                @foreach ($videos as $video)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $video->video_title }}</td>
                                        <td>{{ $video->video_link }}</td>
                                        <td>{{ $video->video_description }}</td>
                                        <td> <a href="{{ route('videos-on-demand.edit', $video->id) }}"><i
                                                    class="fas fa-edit text-primary"></i></a>
                                            <a href="javascript:void(0)" id="editCompany" class="video"
                                                data-id="{{ $video->id }}"><i class="far fa-eye text-info"></i></a>
                                            {{-- <a href="{{route('videos-on-demand.show', $video->id)}}"> <i class="far fa-eye text-info"></i></a> --}}
                                            <a href="javascript:void(0);" class="text-decoration-none"
                                                onclick="deleteRecord('{{ $video->id }}', '/superadmin/videos-on-demand/')">
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
    <div class="modal fade" id="practice_modal">
        <div class="modal-dialog">
            <form id="companydata">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- <input type="hidden" id="color_id" name="color_id" value=""> --}}
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="video-box">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" id="videolink" src=""
                                        allowfullscreen></iframe>
                                </div>
                                {{-- <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ asset('/vetvineUsers/videos/'.$video->post_add_video)}}"allowfullscreen></iframe>
                       </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            // deleteRecord();
            $(document).ready(function(e) {
                $(".video").on("click", function(e) {
                    e.preventDefault();
                    var id = $(this).attr('data-id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('videoajaxdata') }}",
                        method: 'POST',
                        data: {
                            id: id,
                        },
                        success: function(response) {
                            var videolink = response.video_link;
                            $("#practice_modal").modal("show");
                            $("#videolink").attr('src', videolink);
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });

                })
            })
        </script>
        
    @endsection
