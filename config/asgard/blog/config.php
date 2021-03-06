<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define an array of views on which to bind the $latestPosts collection
    |--------------------------------------------------------------------------
    */
    'latest-posts' => [
        'blog.*',
    ],

    'post' => [
        /*
        |--------------------------------------------------------------------------
        | Partials to include on page views
        |--------------------------------------------------------------------------
        | List the partials you wish to include on the different type page views
        | The content of those fields well be caught by the PostWasCreated and PostWasEdited events
        */
        'partials' => [
            'translatable' => [
                'create' => [],
                'edit' => [],
            ],
            'normal' => [
                'create' => [],
                'edit' => [
                    'blogextension::admin.comments.extension',
                ],
            ],
        ],
        /*
        |--------------------------------------------------------------------------
        | Dynamic relations
        |--------------------------------------------------------------------------
        | Add relations that will be dynamically added to the Post entity
        */
        'relations' => [
            'parentComments' => function ($self) {
                return $self->hasMany(\Modules\BlogExtension\Entities\Comment::class, 'blog_post_id', 'id')->whereNull('comment_parent_id')->get();
            },
            'comments' => function ($self) {
                return $self->hasMany(\Modules\BlogExtension\Entities\Comment::class, 'blog_post_id', 'id')->get();
            },
        ],
    ],
];
