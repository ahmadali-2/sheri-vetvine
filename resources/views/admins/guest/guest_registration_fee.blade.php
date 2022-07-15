@extends('admins.master')
<style>
    .pagination {justify-content: center; padding-bottom: 20px}
</style>
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
                        <strong class="card-title">Guest Registration Fee</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                @foreach($userNetworkLevels as $key=>$userNetworkLevel)
                                    <tr>
                                        <form id="guest_registration_fee_{{$key}}">
                                            <input type="text" name="network_level_id" value="{{$userNetworkLevel->id}}" hidden>
                                            <td><i class="fa fa-user" aria-hidden="true" style="color: #707376"></i> - {{$userNetworkLevel->name}}</td>
                                            <td>
                                                <input type="number" class="form-control" name="registration_fee", placeholder="Enter registration fee" value="{{$userNetworkLevel->registration_fee}}">
                                            </td>
                                            <td class="save_guest_registration_fee">
                                                <input data-key="{{$key}}" type="button" class="btn btn-primary" name="save_guest_fee" value="Save">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$userNetworkLevels->links()}}
            </div>
        </div>
    </div>
@endsection
@section('adminscripts')
    <script>
        $(document).ready(function() {
            $('.save_guest_registration_fee input').on('click', function(){
                var form_id = '#guest_registration_fee_'+$(this).attr('data-key');
                var form_data = $(form_id).serialize();
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },

                type: "POST",
                url: '/superadmin/update-guest-registration-fee',
                data: form_data,
                success: function(response){
                    if(response.code == 200){
                        toastr.success(response.message);
                    }else{
                        toastr.error(response.message);
                    }
                }
                });
            });
        })
    </script>
@endsection
