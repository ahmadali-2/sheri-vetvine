@extends('admins.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" style="background-color:#f27222"
                        href="{{ route('membership.create') }}">
                        Add New Plan
                    </a>

                </div>
            </div>
        </div>
    </section>
    <div class="plans-main">
        <div class="row m-0">
            @foreach ($plans as $plan)
                <div class="col-lg-4 col-md-6">
                    <div class="content text-center">
                        <p class="free_paln">{{ $plan->plancategory->category_name ?? ''}} Plan</p>
                        <h1 class="free-bold"><span>$</span>{{ $plan->plan_price }}</h1>
                        <ul class="card__text__align">
                            @foreach (json_decode($plan->plan_features) as $feature)
                                <li class="shr__anchor card-list">{{ $feature }}</li>
                            @endforeach

                        </ul>
                        <div class="hover_content">
                            <a href="{{ route('membership.edit', $plan->id) }}" class="btn action-btns"><i
                                    class="fa fa-edit"></i>Edit</a>
                            <!-- <a href="" class="btn action-btns"
                    ><i class="fa fa-trash"></i>Delete</a
                  > -->
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
