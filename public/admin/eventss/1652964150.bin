@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ $comment->user->name }}</strong>
    <p class="m-3">{{ $comment->comment }}
        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger py-0" onclick="deleteRecord('{{$comment->id}}', '/comment-destroy/')">Delete</a>
    </p>
    <a href="" id="reply"></a>
    <form method="post" id="replyfrm" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="reply" class="form-control" style="border: 1px solid #ced4da !important;"/>
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>
    @include('frontend.pages.forums.replies', ['comments' => $comment->replies])
</div>
@endforeach
@section('scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\VetvineUsers\PostManagement\CreateReplyRequest','#replyfrm') !!}
@endsection
