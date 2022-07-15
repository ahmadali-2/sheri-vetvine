<div class="col-sm-7">

    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>

    <div class="header-left">

        <button class="search-trigger"><i class="fa fa-search"></i></button>

        <div class="form-inline">

            <form class="search-form">

                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">

                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>

            </form>

        </div>



        <div class="dropdown for-notification">

            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <i class="fa fa-bell"></i>

                <span class="count bg-danger">5</span>

            </button>

            <div class="dropdown-menu" aria-labelledby="notification">

                <p class="red">You have 3 Notification</p>

                <a class="dropdown-item media bg-flat-color-1" href="#">

                    <i class="fa fa-check"></i>

                    <p>Server #1 overloaded.</p>

                </a>

                <a class="dropdown-item media bg-flat-color-4" href="#">

                    <i class="fa fa-info"></i>

                    <p>Server #2 overloaded.</p>

                </a>

                <a class="dropdown-item media bg-flat-color-5" href="#">

                    <i class="fa fa-warning"></i>

                    <p>Server #3 overloaded.</p>

                </a>

            </div>

        </div>



        <div class="dropdown for-message">

            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <i class="ti-email"></i>

                <span class="count-messages bg-primary">0</span>

            </button>

            @php
                $messages = vetvineHelper::adminUserMessages();
            @endphp

            <div class="dropdown-menu admin-messages" aria-labelledby="message">

                    @foreach ($messages as $item)
                    <a class="dropdown-item media bg-flat-color-1" href="#">
                        <span class="photo media-left"><img alt="avatar"
                                src=""></span>
                        <span class="message media-body">
                            <span class="name float-left">{{ $item->name }}</span>
                            <span class="time float-right">{{ $item->created_at->diffForHumans()  }}</span>
                            <p>{{ $item->body }}</p>
                        </span>
                        </a>
                    @endforeach
                {{-- <p class="red">You have <span class="count-messages" >0</span> messages</p> --}}


            </div>

        </div>

    </div>

</div>



<div class="col-sm-5">

    <div class="user-area dropdown float-right">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <img class="user-avatar rounded-circle" src="{{ asset('admin/images/admin.jpg') }}" alt="User Avatar">

        </a>



        <div class="user-menu dropdown-menu">

            <a class="nav-link" href="{{ route('generalsettings.index') }}"><i class="fa fa-user"></i> My Profile</a>



            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span
                    class="count">13</span></a>



            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();

                                    this.closest('form').submit();"
                    style="margin-top: 20px !important;">

                    <i class="fa fa-power-off"></i> Logout

                </a>

            </form>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script>
        $(document).ready(function() {
            // alert('runnning');
            var notificationsWrapper = $('.dropdown-notifications');
            var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
            var notificationsCountElem = notificationsToggle.find('i[data-count]');
            var notificationsCount = parseInt(notificationsCountElem.data('count'));
            var notifications = notificationsWrapper.find('ul.dropdown-menu');

            if (notificationsCount <= 0) {
                notificationsWrapper.hide();
            }

            var pusher = new Pusher('6e28b8146a38abf8bcc7', {
                cluster: 'ap2',
            });

            var channel = pusher.subscribe('my-channel');

            channel.bind('notification-event', function(data) {
                console.log(data);
                channel.bind('notification-event', function(data) {
                    console.log(data);
                    $(data).each(function() {
                        var name = data.user_messages_name;
                        var img = data.user_messages_img;
                        var message = data.message;
                        var profileimg = "{{ asset('frontend/images/') }}" + img;
                        var html = $(`
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar"
                                        src=""></span>
                                <span class="message media-body">
                                    <span class="name float-left">` + name + `</span>
                                    <span class="time float-right">Just now</span>
                                    <p>` + message + `</p>
                                </span>
                                </a>
                    `);
                        $(".admin-messages").append(html);
                    })
                    var count = parseInt($(".count-messages").text());
                    count += 1;
                    $(".count-messages").html(count);
                })


            })
        })
    </script>
@endsection
