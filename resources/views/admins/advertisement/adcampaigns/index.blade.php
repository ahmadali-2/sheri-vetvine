 @extends('admins.master')

 @section('content')
     <section class="content-header">

         <div class="container-fluid">

             <div class="row mb-2">

                 <div class="col-sm-6">

                 </div>

                 <div class="col-sm-6">

                     <a class="btn btn-primary float-right" href="{{ route('ads-campaign.create') }}">

                         Create New Campaign

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

                         <strong class="card-title">Manage Ad Campaigns</strong>

                     </div>

                     <div class="card-body">

                         <table class="table">

                             <thead>

                                 <tr>

                                     <th scope="col">#</th>

                                     <th scope="col">Name</th>

                                     <th scope="col">Start</th>

                                     <th scope="col">End</th>

                                     <th scope="col">Views</th>

                                     <th scope="col">Clicks</th>

                                     <th scope="col">Min-CTR</th>


                                     <th scope="col">Status</th>

                                     <th scope="col">Actions</th>

                                 </tr>

                             </thead>

                             <tbody>

                                 @foreach ($adCampaigns as $adCampaign)
                                     <tr>

                                         <td scope="row">{{ $loop->iteration }}</td>

                                         <td>{{ $adCampaign->campaign_name }}</td>

                                         <td>{{ date('d-M', strtotime($adCampaign->start_date)) }}</td>

                                         <td>{{ date('d-M', strtotime($adCampaign->end_date)) }}</td>

                                         <td>{{ $adCampaign->total_views_allowed }}</td>

                                         <td>{{ $adCampaign->total_clicks_allowed }}</td>

                                         <td>{{ $adCampaign->min_ctr }}</td>


                                         <td>

                                             @if ($adCampaign->status == 1)
                                                 <span class="badge badge-pill badge-success">Active</span>
                                             @else
                                                 <span class="badge badge-pill badge-danger">Inactive</span>
                                             @endif

                                         </td>

                                         <td>

                                             <a href="{{ route('ads-campaign.edit', $adCampaign->id) }}"><i
                                                     class="fas fa-edit text-primary"></i></a>


                                             <a href="javascript:void(0);" class="text-decoration-none"
                                                 onclick="deleteRecord('{{ $adCampaign->id }}', '/superadmin/ads-campaign/')">

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
