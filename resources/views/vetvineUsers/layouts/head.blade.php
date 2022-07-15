  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- chatiy meta links --}}
  @if (ROUTE::current()->uri == 'chatify')
      <meta name="id" content="{{ $id }}">
      <meta name="type" content="{{ $type }}">
  @endif
  {{-- <meta name="messenger-color" content="{{ $messengerColor }}"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="url" content="{{ url('') . '/' . config('chatify.routes.prefix') }}"
      data-user="{{ Auth::user()->id }}">

  <title>VETVINE</title>
  <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap-notifications.min.css') }}">

  {{-- chatify additonal css --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  {{-- <script src="{{ asset('js/chatify/font.awesome.min.js') }}"></script> --}}
  <script src="{{ asset('js/chatify/autosize.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

  {{-- styles --}}
  <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css' />
  <link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />

      {{-- <link href="{{ asset('css/chatify/' . $dark_mode . '.mode.css') }}" rel="stylesheet" /> --}}

  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> --}}

  {{-- Messenger Color Style --}}
   <style>
    .messenger-sendCard {
    background: #fff;

}
.messenger-sendCard form {
    width: 100%;
    display: inline-flex;
    margin: 0;
    padding: 0px 10px;
    /* background: #5c7c85; */
    border: 3px solid #5c7c85 !important;
}
.messenger-sendCard form  span{
    color: #f27222;
    font-size: 25px;
}
 .messenger-listView-tabs a:hover, .messenger-listView-tabs a:focus {
    color: #f27222 !important;
}
.mc-sender p {
    background: #f27222 !important;
    color: #fff !important;
}
.m-list-active{
    background: #507f87 !important;
    border-left: 5px solid  #f27222 !important;

}
.m-header-messaging .avatar {
    background-color: #fff;
}
.message-card p {
    background: #5c7c85;
    color: #fff;
    box-shadow: 0px 6px 11px rgb(18 67 105 / 3%);
}
</style>

  @toastr_css
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
  {{-- <!--[if lt IE 9]> --}}
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  {{-- <![endif]--> --}}
