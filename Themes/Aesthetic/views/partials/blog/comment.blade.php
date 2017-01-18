<li class="comment">
    <a href="#"
       class="pull-left">
        <img class="avatar"
             src="http://1.gravatar.com/avatar/afaa67c22b665e854fa5790c02a57866?s=65&d=mm&r=g"/>
    </a>
    <div class="comment-body">
        <div class="comment-heading">
            <h4 class="user">
                {{ $comment->nickname }}
            </h4>
            <h5 class="time">{{ $comment->created_at }}</h5>
            <a href="#"
            class="color-primary pull-right"><i class="fa fa-reply"></i> {{ trans('blogextension::core.reply') }}</a>
        </div>
        <p>{{ $comment->comment_text }}</p>
    </div>
    <ul class="comment-list">
        @each('partials.blog.comment',$comment->replies, 'comment')
    </ul>
</li>