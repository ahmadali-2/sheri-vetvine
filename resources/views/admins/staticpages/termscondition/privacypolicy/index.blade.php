@extends('admins.master')
@section('content')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Privacy & Policy</strong>
                </div>

                    <div id="pay-invoice">
                        <div class="card-body">
                            <form action="{{ route('privacy-policy.store') }}" method="post" id="terms-form"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group" style="width: 100%;">
                                            <label for="page_title" class="control-label mb-1">Privacy & Policy
                                                Title</label>
                                            <input id="page_title" placeholder="Enter Title" name="page_title"
                                                value="{{ isset($privacy->page_title) ? $privacy->page_title : '' }}"
                                                name="page_title" type="text" class="form-control" value=""
                                                required>
                                            @error('page_title')
                                                <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="pageDesc"> Description</label>
                                            <textarea name="pageDesc" class="ckeditor" id="" cols="100" rows="100" required>{{ isset($privacy->page_desc) ? $privacy->page_desc : '' }}</textarea>
                                            @error('pageDesc')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


            </div>
        </div>
    </div>
@section('scripts')
    <script>
        $(document).ready(function() {
            CKEDITOR.editorConfig = function(config) {
                config.height = '1000px';
            };
        })
    </script>
@endsection
@endsection
