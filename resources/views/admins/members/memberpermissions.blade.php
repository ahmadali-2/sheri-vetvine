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
                {{-- Original Card below --}}
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Member Permissions Table</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>View Ads</th>
                                    <td>
                                        <span id="changememberstatus" data-permissiontypeId="{{ $id }}"
                                            data-permissiontypeName="view_ads">

                                            <input id="chkPermission1" name="view_ads" type="checkbox" @php
                                                if ($data) {
                                                    if ($data->view_ads == '1') {
                                                        echo 'checked=true';
                                                    }
                                                }
                                            @endphp
                                                data-toggle="toggle" data-onstyle="outline-success" data-size="xs"
                                                data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Allowed"
                                                data-off="<i class='fa fa-lock'></i> Not Allowed"></span>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Licesnsure</th>
                                    <td>
                                        <span id="changememberstatus" data-permissiontypeId="{{ $id }}"
                                            data-permissiontypeName="licensure">

                                            <input id="chkPermission3" name="licensure" type="checkbox" @php
                                                if ($data) {
                                                    if ($data->licensure == '1') {
                                                        echo 'checked=true';
                                                    }
                                                }
                                            @endphp
                                                data-toggle="toggle" data-onstyle="outline-success" data-size="xs"
                                                data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Allowed"
                                                data-off="<i class='fa fa-lock'></i> Not Allowed"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Comments</th>
                                    <td>
                                        <span id="changememberstatus" data-permissiontypeId="{{ $id }}"
                                            data-permissiontypeName="comments">

                                            <input id="chkPermission2" name="comments" type="checkbox" @php
                                                if ($data) {
                                                    if ($data->comments == '1') {
                                                        echo 'checked=true';
                                                    }
                                                }
                                            @endphp
                                                data-toggle="toggle" data-onstyle="outline-success" data-size="xs"
                                                data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Allowed"
                                                data-off="<i class='fa fa-lock'></i> Not Allowed"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Likes</th>
                                    <td>
                                        <span id="changememberstatus" data-permissiontypeId="{{ $id }}"
                                            data-permissiontypeName="likes">

                                            <input id="chkPermission4" name="likes" type="checkbox" @php
                                                if ($data) {
                                                    if ($data->likes == '1') {
                                                        echo 'checked=true';
                                                    }
                                                }
                                            @endphp
                                                data-toggle="toggle" data-onstyle="outline-success" data-size="xs"
                                                data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Allowed"
                                                data-off="<i class='fa fa-lock'></i> Not Allowed"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shares</th>
                                    <td>
                                        <span id="changememberstatus" data-permissiontypeId="{{ $id }}"
                                            data-permissiontypeName="shares">

                                            <input id="chkPermission5" name="shares" type="checkbox" @php
                                                if ($data) {
                                                    if ($data->shares == '1') {
                                                        echo 'checked=true';
                                                    }
                                                }
                                            @endphp
                                                data-toggle="toggle" data-onstyle="outline-success" data-size="xs"
                                                data-offstyle="outline-danger"
                                                data-on="<i class='fa fa-unlock'></i> Allowed"
                                                data-off="<i class='fa fa-lock'></i> Not Allowed"></span>
                                    </td>
                                </tr>

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
            $(document).on('click', '#changememberstatus', function() {
                var checkbox1 = false;
                var checkbox2 = false;
                var checkbox3 = false;
                var checkbox4 = false;
                var checkbox5 = false;
                if ($('#chkPermission1').is(":checked")) {
                    checkbox1 = true;
                }
                if ($('#chkPermission2').is(":checked")) {
                    checkbox2 = true;
                }
                if ($('#chkPermission3').is(":checked")) {
                    checkbox3 = true;
                }
                if ($('#chkPermission4').is(":checked")) {
                    checkbox4 = true;
                }
                if ($('#chkPermission5').is(":checked")) {
                    checkbox5 = true;
                }
                // alert(checkbox1)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var memberId = $(this).attr("data-permissiontypeId");
                var name = $(this).attr("data-permissiontypeName");
                $.ajax({
                    data: {
                        memberId: memberId,
                        checkbox1: checkbox1,
                        checkbox2: checkbox2,
                        checkbox3: checkbox3,
                        checkbox4: checkbox4,
                        checkbox5: checkbox5,
                        name: name,

                    },
                    url: "{{ route('memberstatus') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data.response == 'success') {
                            toastr.success('Permission updated successfully.')
                        }

                    },

                });


            });

        })
    </script>
@endsection
