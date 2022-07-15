    <script src="{{ asset('admin/vendors/jquery/dist/jquery.min.js ') }}"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>



    <script src="{{ asset('admin/vendors/popper.js/dist/umd/popper.min.js') }}"></script>

    <script src="{{ asset('admin/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>



    <script src="{{ asset('admin/js/admin.js') }}"></script>

    <script src="{{ asset('admin/js/inputmask.js') }}"></script>

    <script src="{{ asset('vendor/select2/dist/js/select2.min.js')}}"></script>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js')}}"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {

            $('#phone_no').inputmask('(+1) 999-999-9999');

            $('.js-example-basic-multiple').select2();

            CKEDITOR.replace( 'description' );

        });



    </script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdsCampaign\CreateAdsCampaignRequest', '#createadscampaign') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Generalsetting\GeneralSettingRequest', '#generalsettingform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AdsCampaign\CreateAdsManageRequest', '#createadsmanage') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Webinar\CreateCategoryRequest', '#createcategory') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\News\CreateNewsRequest', '#newsform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Announcements\CreateAnnouncementRequest', '#announcementsform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Forums\CreateForumRequest','#forumform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Forums\ForumCategoryRequest','#categoryform') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Webinar\CreateContinueEducationRequest','#continueeducationfrm') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Membership\CreatePlanCategoryRequest','#plancategory') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Membership\CreatePlanRequest','#plan') !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\Webinar\CreateSponserRequest','#createsponser') !!}
    {!! JsValidator::formRequest('App\Http\Requests\TermsRequest','#terms-form') !!}


    @toastr_js

    @toastr_render

    @notifyJs

    <x:notify-messages />

    @yield('adminscripts')

