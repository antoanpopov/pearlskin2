<?php

namespace Modules\BlogExtension\Http\Controllers\Admin;

use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Requests\CreatePostRequest;
use Modules\Blog\Http\Requests\UpdatePostRequest;
use Modules\BlogExtension\Repositories\CommentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CommentController extends AdminBaseController
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        parent::__construct();

        $this->commentRepository = $commentRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = $this->commentRepository->all();

        return view('blogextension::admin.comments.index', compact('comments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return \Illuminate\View\View
     */
    public function edit(Comment $comment)
    {
        $thumbnail = $this->file->findFileByZoneForEntity('thumbnail', $post);
        $categories = $this->category->allTranslatedIn(app()->getLocale());
        $statuses = $this->status->lists();
        $this->assetPipeline->requireJs('ckeditor.js');

        return view('blog::admin.posts.edit', compact('comment', 'categories', 'thumbnail', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Post $post
     * @param UpdatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $this->post->update($post, $request->all());

        return redirect()->route('admin.blog.post.index')
            ->withSuccess(trans('blog::messages.post updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();

        $this->post->destroy($post);

        return redirect()->route('admin.blog.post.index')
            ->withSuccess(trans('blog::messages.post deleted'));
    }
}
