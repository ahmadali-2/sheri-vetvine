@extends('admins.master')
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Un Approved Users</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No #</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Network</th>
                                    <th scope="col">Approve</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($allUsers as $unapproveuser)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $unapproveuser->name ?? '' }}</td>
                                        <td>{{ $unapproveuser->email ?? '' }}</td>
                                        <td>{{ $unapproveuser->userNetworkLevel->name }}</td>
                                        <td>
                                            <span id="changeuserstatus" data-userId="{{ $unapproveuser->id }}"><input
                                                    type="checkbox" value="43" data-toggle="toggle"
                                                    data-onstyle="outline-success" data-size="xs"
                                                    data-offstyle="outline-danger"
                                                    data-on="<i class='fa fa-unlock'></i> Approved"
                                                    data-off="<i class='fa fa-lock'></i> Pending"></span>

                                        <td>

                                            <a href="javascript:void(0);" class="text-decoration-none"
                                                onclick="deleteRecord('{{ $unapproveuser->id }}', '/superadmin/delete-users/')">
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
@section('adminscripts')
    <script>
        $(document).ready(function() {
            // alert(test);
            $(document).on('click', '#changeuserstatus', function() {
                var test = document.getElementById('changeuserstatus').value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var userid = $(this).attr("data-userId");
                $.ajax({
                    data: {
                        userid: userid
                    },
                    url: "{{ route('approveuser') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        if (data.response = "success") {
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        } else {

                        }

                    },

                });


            });

        })
    </script>
@endsection
