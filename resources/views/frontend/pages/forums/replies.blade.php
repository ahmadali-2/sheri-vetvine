@php
    $padding = 15;
@endphp
@foreach($comments as $key=>$comment)

@php
     $padding + 30;
@endphp
<div class="display-comment" style="padding-left: {{$padding}}px;">
    @if($comment->ce == $ce)
        <img src="@if($comment->user->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/' . $comment->user->profile_photo) }} @else {{asset('frontend/images/dummy.png')}} @endif" class="post_box_small_img" width="262" height="198" alt=""><strong style="margin-left: 10px;">{{ $comment->user->name }}</strong>
        <p style="margin:0px; margin-left: 60px; font-size: 13px;"><i class="fa fa-clock-o" aria-hidden="true" style="color: #8ac98a;"></i> {{$comment->created_at->diffForHumans()}}</p>
        <p id="deleteComment_{{$comment->id}}" data-key="{{$comment->id}}" style="margin-top: 5px; margin-left: 60px; margin-bottom: 10px;">{{ $comment->comment }}
            <a href="javascript:void(0);" data-comment-id="{{$comment->id}}">
                <i class="fa fa-trash text-danger ml-2" aria-hidden="true"></i></a>
        </p>
        <a href="" id="reply"></a>
        <form id="replyfrm_{{$comment->id}}">
            <div class="row">
                <div class="col-sm-10" style="padding-right: 0px;">
                    <div class="form-group" style="margin-bottom: 10px;">
                        <input type="text" name="reply" id="reply" placeholder="Enter reply here" class="form-control" style="border: 1px solid #ced4da !important;"/>
                        <input type="hidden" id="reply_post_id" name="post_id" value="{{ $post_id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                    </div>
                </div>
                <div class="col-sm-2" style="padding-left: 10px;">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-key="{{$comment->id}}" style="background-color: #F27222;">Reply</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="comment_replies">
            @include('frontend.pages.forums.replies', ['comments' => $comment->replies])
        </div>
    @endif
</div>
@endforeach
