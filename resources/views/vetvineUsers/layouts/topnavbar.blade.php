



<div class="top-social">

    <ul class="list__icons">

      <li>

        <div class="input-group mb-3">

          <span class="search-text">Search: &nbsp;</span>

          <input type="text" class="form-control top-search" placeholder="" aria-label="Recipient's username"

            aria-describedby="basic-addon2">

          <div class="input-group-append">

            <button class="btn search_btn" type="button">

              <i class="fa fa-search"></i>

            </button>

          </div>

        </div>

      </li>

      <li>

        <form method="POST" action="{{ route('logout') }}">
      @csrf
        <a class="reg-login_btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                              this.closest('form').submit();">Logout</a>
      </form>

      </li>

      <li>

        <div class="dropdown">

          <button class="btn dropdown-toggle profile-dropdown" type="button" id="dropdownMenuButton"

            data-toggle="dropdown" aria-expanded="false">

            <div class="loggedin-user">
              <img src="@if(Auth::user()->profile_photo) {{ asset('/frontend/images/Profile-Images/'.Auth::user()->profile_photo)}} @else
              {{asset('frontend/img/profile-avatar.png')}} @endif" alt="" id="user-image" height="200px">
              {{-- <img src="{{asset('frontend/img/profile-avatar.png')}}" alt="avatar" /> --}}

            </div>

          </button>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            <a class="dropdown-item" href="{{ route('updateprofile.create')}}">Profile</a>

            <a class="dropdown-item" href="#">My Account</a>

            <form method="POST" action="{{ route('logout') }}">

      @csrf

      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              this.closest('form').submit();">Logout</a>
    </form>

          </div>

        </div>

      </li>

    </ul>



  </div>

