@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Category & Forum</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select_form" class="control-label mb-1 form-select">Select Category Or
                                        Forum</label>
                                    <select id="select_form" name="select_form" aria-label="Default select example"
                                        class="form-control cc-number identified visa" value="" data-val="true">
                                        <option selected value="">Open this select level</option>
                                        <option value="1">Add Category</option>
                                        <option value="2">Add Forum</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('forums.store') }}" method="post" id="forumform"  novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="forum_title" class="control-label mb-1">Forum Title</label>
                                        <input id="forum_title" placeholder="Enter Title" name="forum_title" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category_id" class="control-label mb-1 form-select">Category</label>
                                        <select id="category_id" name="category_id" aria-label="Default select example"
                                            class="form-control cc-number identified visa" value="" data-val="true">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="forum_description" class="control-label mb-1">Forum Description</label>
                                        <textarea class="form-control" id="forum_description" rows="3" name="forum_description" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="member_id" class="control-label mb-1 form-select">Member Level</label>
                                        <select class="js-example-basic-multiple form-control" name="member_id[]"
                                            data-val="true" multiple="multiple" style="width: 100%">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </form>
                        <form action="{{ route('forums-category.store') }}" method="post" id="categoryform"
                            novalidate="novalidate">
                            @csrf
                            <div class="row" id="category_title">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category_title" class="control-label mb-1">Category Title</label>
                                        <input id="category_title" placeholder="Enter Title" name="category_title"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="category_description" class="control-label mb-1">Category Description</label>
                                        <textarea class="form-control" id="category_description" rows="3" name="category_description" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        $('#categoryform').hide();
        $('#forumform').hide();
        $("#select_form").change(function() {
            if ($(this).val() == "1") {
                $('#forumform').hide();
                $('#categoryform').show();
            } else if ($(this).val() == "2") {
                $('#forumform').show();
                $('#categoryform').hide();
            } else {
                $('#forumform').hide();
                $('#categoryform').hide();
            }
        });
    </script>
@endsection
