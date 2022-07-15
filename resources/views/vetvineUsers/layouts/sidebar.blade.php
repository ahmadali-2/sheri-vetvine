<aside class="shadow-sm" id="aside-nav">

    <!-- aside logo brand -->

    <div class="container times_cont">

      <div class="row">

        <div class="col-12 pt-3">

          <div class="text-right">

            <i class="fas fa-times text-white pr-2" id="times"></i>

          </div>

        </div>

      </div>

    </div>

    <!-- aside nav ul list -->
    <ul class="nav flex-column nav_ul" id="aside-nav-ul">

      <li>
        <a href="#" class="active personal"><i class="fa fa-angle-right" a></i> Personal Info</a>
      </li>
      <li>
        <a href="#" class="employe"><i class="fa fa-angle-right" aria-hidden="true"></i> Employment Info</a>
      </li>
      <li>
        <a href="#" class="profile"><i class="fa fa-angle-right" aria-hidden="true"></i> Edit My Photo</a>
      </li>
      {{-- <li>
        <a href="{{route('userdelete',Auth::user()->id)}}" class="profile"><i class="fa fa-angle-right" aria-hidden="true"></i> Delete My Account</a>
      </li> --}}
      {{-- <li>
        <a href="{{route('post.create')}}" class="profile"><i class="fa fa-angle-right" aria-hidden="true"></i> Create Post</a>
      </li>
      <li>
        <a href="{{route('post.index')}}" class="profile"><i class="fa fa-angle-right" aria-hidden="true"></i> Show Post</a>
      </li> --}}
      <li>

        <a href="{{route('usermemberships.index')}}"><i class="fa fa-angle-right" aria-hidden="true"></i> MemberShip Plans</a>

      </li>

    </ul>
    </aside>

