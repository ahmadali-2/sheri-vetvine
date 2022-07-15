@forelse ($posts as $forumpost )

<tr>
    <td><a href="{{ route('getForumcategoryPosts',$forumpost->id) }}"><h4>{{ $forumpost->post_title ?? '' }}</h4></a> </td>

    <td>{{ $forumpost->comments->count('comments')}}</td>
    <td id="commentajax">{{ $forumpost->likes->sum('like')}}</td>
    <td id="countajax">{{ $forumpost->postView->count('postView')}}</td>
    <td class="d-flex align-items-center"><img src={{ asset('frontend/forums/img/user.png') }}  class="mr-1" alt="">{{  date('M d ,Y', strtotime($forumpost->created_at)) }}</td>
    @auth
    <td>
        <button type="button dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('frontend/forums/img/dots.png') }}" alt="" >
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="box-shadow: 0px 0px 5px 0px rgb(84 84 84);">

            <a class="btn btn-primary dropdown-item" href="{{ route('forums-posts.edit', $forumpost->id) }}">Edit</a>

            <a href="javascript:void(0);" class="btn btn-primary dropdown-item"
                onclick="deleteRecord('{{ $forumpost->id }}', '/vetvine-member/forums-posts/')">Delete</a>

          </div>
        {{-- <div class="col-sm-12 text-right" id="third">

        </div> --}}

    </td>
    @endauth
</tr>

@empty
   <h3 id="formPostDiv">Not Found</h3>
@endforelse
