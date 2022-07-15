<?php

namespace App\Events;

use App\Models\Admins\Forum\Post;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userName;
    public $userDesc;

    public $postTitle;

    public $userPhoto;

    public $postImg;

    public $from_message;
    public $to_message;

    public $message;

    public $user_messages_name;
    public $user_messages_image;

    // public $likes;
    /**.
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post_id, $body)
    {
        // $post = Post::find($post_id) ?? '';
        // $user = User::find($post_id) ?? '';
        // $this->userPhoto = $user->profile_photo ?? '';
        // $this->userName = $post->user->name ?? '';
        // $this->postImg = $post->post_photo ?? '';
        // $this->userDesc = $post->post_description ?? '';
        // $this->postTitle = $post->post_title ?? '';
        $user_messages = User::find($post_id) ?? '';
        $this->user_messages_name = $user_messages->name ?? '';
        $this->user_messages_img = $user_messages->profile_photo ?? '';
        $this->from_message = $post_id ?? '';
        $this->message = $body ?? '';
        // $this->likes = $likes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }
    public function broadcastAs()
    {
        return 'notification-event';
    }
}
