@forelse ($forums as $forum )

<tr>
    <td>    <a href="{{ route('getForumPosts',$forum->id) }}"><h4>{{ $forum->forum_title ?? '' }}</h4></a> </td>

    <td>{{ $forum->posts->count() }}</td>
    <td> {{ $forum->likecount->sum('like')}}</td>
    <td>0</td>
    <td class="d-flex align-items-center"><img src={{ asset('frontend/forums/img/user.png') }}  class="mr-1" alt="">{{ date('M d ,Y', strtotime($forum->created_at)) }}</td>
    <td><img src="{{ asset('frontend/forums/img/dots.png') }}" alt=""></td>
</tr>

@empty
   <h3 id="category_wise_notFound">Not Found</h3>
@endforelse
