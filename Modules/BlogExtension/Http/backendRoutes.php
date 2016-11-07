<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->bind('comment', function ($id) {
    return app(\Modules\Blog\Repositories\CommentRepository::class)->find($id);
});

$router->group(['prefix' => '/blog'], function (Router $router) {

    $router->get('comments', [
        'as' => 'admin.blogextension.comment.index',
        'uses' => 'CommentController@index',
        'middleware' => 'can:blog.posts.index',
    ]);
    $router->get('comments/create', [
        'as' => 'admin.blogextension.comment.create',
        'uses' => 'CommentController@create',
        'middleware' => 'can:blog.posts.create',
    ]);

    $router->get('comments/{comment}/edit', [
        'as' => 'admin.blogextension.comment.edit',
        'uses' => 'CommentController@edit',
        'middleware' => 'can:blog.posts.edit',
    ]);
    $router->put('comments/{comment}', [
        'as' => 'admin.blogextension.comment.update',
        'uses' => 'CommentController@update',
        'middleware' => 'can:blog.posts.edit',
    ]);
    $router->delete('comments/{comment}', [
        'as' => 'admin.blogextension.comment.destroy',
        'uses' => 'CommentController@destroy',
        'middleware' => 'can:blog.posts.destroy',
    ]);


});
