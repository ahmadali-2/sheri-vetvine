@extends('frontend.master')
@section('content')
    <section class="main_banner_bottob_label"></section>
    <section class="become_member_area">
        <div class="container">
            <h2>
                <span>Posts
                </span>
            </h2>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 p-5">
                    <form action="{{ route('forums-posts.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control"
                                style="border:1px solid black !important;border-radius:5px!important">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" style="border:1px solid black !important;border-radius:5px!important"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" value="POST">
                        </div>
                    </form>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <div style="height: 50px;"></div>
    </section>
@endsection
