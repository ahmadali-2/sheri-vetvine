<style>
    .pagination {justify-content: center;}
</style>
<?php
    $displayLike = false;
    $comments = null;
?>
@forelse($posts as $key=>$post)
    @if($post->getTable() == "shares")
        <?php $share = $post ?>
        <input id="member_home_post_id_{{$key}}" data-key={{$key}} type="number" value="{{$share->post_id}}" hidden>
        <input id="member_home_user_id_{{$key}}" data-key={{$key}} type="number" value="{{$share->user_id}}" hidden>
        <div class="post_center_box" data-key={{$key}}>
            <div class="row">
                <div class=" col-lg-6">
                    <img src="@if ($post->users[0]->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/' . $post->users[0]->profile_photo) }} @else {{ asset('frontend/images/user.png') }} @endif"
                        class="post_box_small_img" width="262" height="198" alt="" />
                    <div class="pull-left box_center_small_label">
                        @foreach($share->users as $user)
                            @if($user->id == $share->user_id)
                                @if($share->ce == 1)
                                    <label>{{ $user->name }} shared a new
                                    Continuing Education item:</label>
                                @else
                                    <label>{{ $user->name }} shared forum
                                    Continuing Education item:</label>
                                @endif
                            @endif
                        @endforeach
                        <p>{{$share->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class=" col-lg-6">
                @foreach($share->posts as $post)
                    @if($post->id == $share->post_id)
                    <div class="pull-left">
                        <label class="post_right_box_heading">{{ $post->post_title }}</label>
                        <h6 class="h6_post_label">
                            {!! $post->post_description !!}
                        </h6>
                        <p><u>Shared on</u> : {{date("m/d/Y", strtotime($share->created_at))}}</p>
                    </div>
                    @endif
                @endforeach

                </div>
            </div>


            <div class="col-sm-12 text-center post_share_button  d-flex justify-content-center">
                <div class="shareLikeButtons">
                    @foreach($share->likes as $like)
                        @if(($like->share_id == $share->id) && ($like->ce == 1) && ($like->like == 1) && ($like->user_id == auth()->user()->id))
                            <?php $displayLike = true ?>
                        <a class="liked" member_home_post_id="{{$share->id}}" member_home_user_id="{{$share->user_id}}" member_home_like_type="0" style="cursor: pointer;"><b class="liked"> <i class='fa fa-thumbs-up'></i> Liked</b></a>
                        @endif
                    @endforeach
                    @if($displayLike == false)
                    <a class="like_color" member_home_post_id="{{$share->id}}" member_home_user_id="{{$share->user_id}}" member_home_like_type="0"> <i class='fa fa-thumbs-up'></i> Like</a>
                    @endif
                    <?php $displayLike = false ?>
                </div>
                <div class="shareCommentButtons">
                    <a class="like_color" style="cursor: pointer;" data-post-id="{{$share->id}}" data-key={{$key}} data-type="share"><i class="fa fa-comments" aria-hidden="true"></i>
                        Comments</a>
                </div>
                <div class="shareButtons">
                    <a class="share_btn" style="cursor: pointer;" data-user-id="{{$share->user_id}}" data-post-id="{{$share->post_id}}"> <i class="fa fa-share" aria-hidden="true"></i>
                        Share</a>
                </div>
            </div>
            <div id="comment_share_{{$key}}" data-key={{$key}} style="display: none; margin-top: 20px;">
                <div id="comments_share_data_{{$key}}">
                    <div class="col-md-6" id="comments_share_view_{{$key}}" data-key="{{$key}}"></div>
                </div>
                <div class="row" style="background-color: wheat; padding: 10px;">
                    <div class="col-sm-8">
                        <input style="background-color: wheat; outline: none; width: 100%;" type="text" name="comment" id="comment_share_value_{{$key}}" placeholder="Type comment here"/>
                    </div>
                    <div class="col-sm-4 send_share_comment" data-key="{{$key}}">
                        <a class="like_color" data-post-id="{{$share->id}}" data-key={{$key}} style="cursor: pointer;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Comment</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <input id="member_home_post_id_{{$key}}" data-key={{$key}} type="number" value="{{$post->id}}" hidden>
        <input id="member_home_user_id_{{$key}}" data-key={{$key}} type="number" value="{{$post->user->id}}" hidden>
        <div class="post_center_box">
            <div class="row">
                <div class=" col-lg-6">
                    <img src="@if ($post->user->profile_photo ?? '') {{ asset('/frontend/images/Profile-Images/' . $post->user->profile_photo) }} @else {{ asset('frontend/images/user.png') }} @endif"
                        class="post_box_small_img" width="262" height="198" alt="" />
                    <div class="pull-left box_center_small_label">
                        <label>{{ $post->user->name }} posted a new
                            Continuing Education item:</label>

                        <p>{{$post->created_at->diffForHumans()}}</p>
                    </div>



                </div>
                <div class=" col-lg-6">

                    <div class="pull-left">
                        <label class="post_right_box_heading">{{ $post->post_title }}</label>
                        <h6 class="h6_post_label">
                            {!! $post->post_description !!}
                        </h6>
                        <p><b></b><u>Posted on</u> : {{date("m/d/Y", strtotime($post->created_at))}}</p>
                    </div>



                </div>


            </div>

            <div class="col-sm-12 text-center post_share_button d-flex justify-content-center like_section_parent">
                <div class="likeButtons">
                    @foreach($post->likes as $like)
                        @if(($like->post_id == $post->id) && ($like->ce == 1) && ($like->like == 1)  && ($like->user_id == auth()->user()->id))
                            <?php $displayLike = true ?>
                        <a  class="liked" member_home_post_id="{{$post->id}}" member_home_user_id="{{$post->user->id}}" member_home_like_type="1" style="cursor: pointer;"><b class="liked"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Liked</b></a>
                        @endif
                    @endforeach
                    @if($displayLike == false)
                    <a class="like_color" member_home_post_id="{{$post->id}}" member_home_user_id="{{$post->user->id}}" member_home_like_type="1"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like</a>
                    @endif
                    <?php $displayLike = false ?>
                </div>
                <div class="commentButtons">
                    <a class="like_color" style="cursor: pointer;" data-post-id="{{$post->id}}" data-key={{$key}} data-type="post"> <i class="fa fa-comments" aria-hidden="true"></i>
                        Comments</a>                </div>
                <div class="shareButtons">
                    <a class="share_btn" style="cursor: pointer;" data-user-id="{{$post->user->id}}" data-post-id="{{$post->id}}"> <i class="fa fa-share" aria-hidden="true"></i>
                        Share</a>
                </div>

            </div>
            <div id="comment_{{$key}}" data-key={{$key}} style="display: none; margin-top: 20px;">
                <div id="comments_data_{{$key}}">
                    <div class="col-md-6" id="comments_view_{{$key}}"></div>
                </div>
                <div class="row" style="background-color: wheat; padding: 10px;">
                    <div class="col-sm-8">
                        <input style="background-color: wheat; outline: none; width: 100%;" type="text" name="comment" id="comment_value_{{$key}}" placeholder="Type comment here"/>
                    </div>
                    <div class="col-sm-4 send_comment" data-key="{{$key}}">
                        <a  class="like_color" data-post-id="{{$post->id}}" data-key={{$key}} style="cursor: pointer;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Comment</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @empty
    <img src="{{ url('frontend/images/no-result.gif') }}" style="width: 100%;"/>
@endforelse
<div class="pagination_div">
    {{ $postActivities->links() }}
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            var likepostid;
            var postUserid;
            var sharePostId;
            var shareUserId
            var likeType;
            var commentPostId;
            var postComment;
            var postId;
            var likesPermission = '<?php echo $likesPermission ?>';
            var commentsPermission = '<?php echo $commentsPermission ?>';
            var sharesPermission = '<?php echo $sharesPermission ?>';

            $('.likeButtons a').on("click", function() {
                likepostid = $(this).attr('member_home_post_id');
                postUserid = $(this).attr('member_home_user_id');
                likeType = $(this).attr('member_home_like_type');
                likePost($(this));
            });

            $('.shareLikeButtons a').on("click", function() {
                likepostid = $(this).attr('member_home_post_id');
                postUserid = $(this).attr('member_home_user_id');
                likeType = $(this).attr('member_home_like_type');
                likePost($(this));
            });

            $('.shareButtons a').on("click", function() {
                sharePostId = $(this).attr('data-post-id');
                sharePost();
            });

            $('.commentButtons a').on("click", function() {
                if(commentsPermission == 1){
                    var commentId = '#comment_'+$(this).attr('data-key');
                    if($(commentId).is(":visible")){
                        $(commentId).hide();
                    }
                    else{
                        refreshComments($(this), $(this).attr('data-type'));
                        $(commentId).show();
                    }
                }else{
                    toastr.error('You dont have permission to comment!');
                }
            });

            $('.shareCommentButtons a').on("click", function(){
                if(commentsPermission == 1){
                    var commentId = '#comment_share_'+$(this).attr('data-key');
                    if($(commentId).is(":visible")){
                        $(commentId).hide();
                    }
                    else{
                        refreshComments($(this), $(this).attr('data-type'));
                        $(commentId).show();
                    }
                }else{
                    toastr.error('You dont have permission to comment!');
                }
            });

            $('.send_comment a').on("click", function(){
                var commentKey = '#comment_value_'+$(this).attr('data-key');
                postComment = $(commentKey).val();
                var postId = $(this).attr('data-post-id');
                var component = $(this);
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/comment/store',
                data: {post_id: postId, comment: postComment, type:'post', ce:1},
                success: function(response){
                    if(response.code == 200){
                        refreshComments(component, 'post');
                        toastr.success(response.message);
                    }
                }
                });
            });

            $('.send_share_comment a').on("click", function(){
                var commentKey = '#comment_share_value_'+$(this).attr('data-key');
                postComment = $(commentKey).val();
                var postId = $(this).attr('data-post-id');
                var component = $(this);
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/comment/store',
                data: {post_id: postId, comment: postComment, type:'share', ce:1},
                success: function(response){
                    if(response.code == 200){
                        refreshComments(component, 'share');
                        toastr.success(response.message);
                    }
                }
                });
            });

        function refreshComments(component, type){
            postId = component.attr('data-post-id');
            console.log('here here '+postId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/show-comments',
                data: {post_id: postId, type: type, ce:1},
                success: function(response){
                    var comment_view;
                    if(type == 'post'){
                        comment_view = '#comments_view_'+component.attr('data-key');
                    }else{
                        comment_view = '#comments_share_view_'+component.attr('data-key');
                    }
                    $(comment_view).empty();
                    $(comment_view).append(response.html);
                        $(comment_view+' button').on('click', function(){
                            var formKey = '#replyfrm_'+$(this).attr('data-key');
                            var formData = $(formKey).serialize()+'&type='+type+'&ce=1';
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                },
                                type: "POST",
                                url: 'reply/store',
                                data: formData,
                                success: function(){
                                    refreshComments(component, type);
                                    toastr.success(response.message);
                                }
                            });
                        });

                        $(comment_view+' a').on('click', function(){
                            var commentId = $(this).attr('data-comment-id');
                            // /deleteSpecificRecord(commentId, '/vetvine-member/comment-destroy/');
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    type: "post",
                                    url: 'comment-destroy/'+commentId,
                                    success: function(){
                                        console.log('deleted');
                                        refreshComments(component, type);
                                        Swal.fire(
                                    'Deleted!',
                                    'Your comment has been deleted.',
                                    'success'
                                    )
                                    }
                                });
                                }
                            });
                        });
                }
            });
        }

        function sharePost(){
            console.log(sharePostId, shareUserId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/share-post',
                data: {sharePostId: sharePostId, ce:1},
                success: function(response){
                    if(response.code == 200){
                        window.location.reload();
                        toastr.success('Post shared Successfully!');
                    }
                    else if(response.code == 400){
                        toastr.error('Please login to continue!');
                    }
                    else if(response.code == 401){
                        toastr.error('Please verify email first!');
                    }
                    else if(response.code == 402){
                        toastr.error(response.message);
                    }
                }
                });
        }
        function likePost(component){
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: '/savelike',
                data: {likepostid: likepostid, postUserid: postUserid, likeType: likeType, ce:1},
                success: function(response){
                    if(response.code == 200){

                        component.html("<b class='liked'> <i class='fa fa-thumbs-up'></i> Liked</b>");
                    }
                    else if(response.code == 201){

                        component.html("<b class='like_color'> <i class='fa fa-thumbs-up'></i> Like</b>");
                    }
                    else if(response.code == 400){

                        component.html("<b class='like_color'> <i class='fa fa-thumbs-up'></i> Like</b>");
                        toastr.error(response.message);
                    }
                }
                });
            }
    </script>
