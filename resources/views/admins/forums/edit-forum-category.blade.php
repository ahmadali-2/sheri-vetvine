@extends('admins.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Category</strong>
                </div>
                <div class="card-body">
                    <div id="pay-invoice">
                        <form action="{{ route('forums-category.update', $CategoryForum->id) }}" method="post"
                            novalidate="novalidate">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category_title" class="control-label mb-1">Category Title</label>
                                        <input id="category_title" placeholder="Enter Title" name="category_title"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            value="{{ $CategoryForum->category_title ?? '' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="category_description" class="control-label mb-1">Category Description</label>
                                        <textarea class="form-control" id="category_description" rows="3" name="category_description"
                                            value="">{{ $CategoryForum->category_description }}</textarea>
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
