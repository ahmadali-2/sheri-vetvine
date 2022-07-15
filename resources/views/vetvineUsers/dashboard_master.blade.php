<!DOCTYPE html>

<html lang="en">



<head>
    @include('vetvineUsers.layouts.head')
</head>

<body>
    @include('vetvineUsers.layouts.dashboard_header')
    <div class="edit-profile-header edit_profile_banner">

    </div>
    @yield('dashboardcontent')
    {{-- @include('vetvineUsers.layouts.footer') --}}
    @include('vetvineUsers.layouts.dashboard_footer_scripts')
</body>

</html>

<!-- footer start  -->

@include('notify::components.notify')
@include('frontend.layouts.footer')


@yield('scripts')

</body>



</html>
