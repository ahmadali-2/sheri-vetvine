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
                        <form action="{{ route('forums.update', $forum->id) }}" method="post" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="forum_title" class="control-label mb-1">Forum Title</label>
                                        <input id="forum_title" placeholder="Enter Title" name="forum_title" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false"
                                            value="{{ $forum->forum_title }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category_id" class="control-label mb-1 form-select">Category</label>
                                        <select id="category_id" name="category_id" aria-label="Default select example"
                                            class="form-control cc-number identified visa" value="" data-val="true">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $forum->category_id) selected @endif>
                                                    {{ $category->category_title }}
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
                                        <textarea class="form-control" id="forum_description" rows="3" name="forum_description"
                                            value="">{{ $forum->forum_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="member_id" class="control-label mb-1 form-select">Member Level</label>
                                        <select class="js-example-basic-multiple form-control" name="member_id[]"
                                            multiple="multiple">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}"
                                                    @if (in_array($member->id, $selectedMembers)) selected @endif>{{ $member->name }}
                                                </option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
@endsection
