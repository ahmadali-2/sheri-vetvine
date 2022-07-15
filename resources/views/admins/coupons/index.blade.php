
 @extends('admins.master')

 @section('content')
     <section class="content-header">

         <div class="container-fluid">

             <div class="row mb-2">

                 <div class="col-sm-6">

                 </div>

                 <div class="col-sm-6">

                     <a class="btn btn-primary float-right" href="{{ route('coupon-code.create') }}">

                         Create New Coupon

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

                         <strong class="card-title">Manage Coupons</strong>

                     </div>

                     <div class="card-body">

                         <table class="table">

                             <thead>

                                 <tr>

                                     <th scope="col">#</th>

                                        <th scope="col">Coupon Code</th>

                                        <th scope="col">Coupon Type</th>

                                        <th scope="col">Start Date</th>

                                        <th scope="col">End Date</th>

                                        <th scope="col">Price</th>

                                        <th scope="col">Action</th>




                                 </tr>

                             </thead>

                             <tbody>

                                    @foreach ($coupons as $coupon)

                                  

                                     <tr>

                                         <td scope="row">{{ $loop->iteration }}</td>

                                         <td>{{ $coupon->coupon_code}}</td>

                                         <td>{{ $coupon->coupon_type }}</td>

                                         <td>{{ date('d-M-y', strtotime($coupon->start_at)) }}</td>

                                         <td>{{ date('d-M-y', strtotime($coupon->expired_at)) }}</td>

                                         <td>{{ $coupon->amount }}</td>

                                         {{-- <td>

                                             @if ($coupon->status == 1)
                                                 <span class="badge badge-pill badge-success">Active</span>
                                             @else
                                                 <span class="badge badge-pill badge-danger">Inactive</span>
                                             @endif

                                         </td> --}}

                                         <td>

                                             <a href="{{ route('coupon-code.edit', $coupon->id) }}"><i
                                                     class="fas fa-edit text-primary"></i></a>


                                             <a href="javascript:void(0);" class="text-decoration-none"
                                                 onclick="deleteRecord('{{ $coupon->id }}', '/superadmin/coupon-code/')">

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
