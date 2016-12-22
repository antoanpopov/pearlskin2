<?php

namespace Modules\BlogExtension\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;

use Modules\BlogExtension\Repositories\CommentRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCommentRepository extends EloquentBaseRepository implements CommentRepository
{
    /**
     * @param  int $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Update a resource
     * @param $comment
     * @param  array $data
     * @return mixed
     */
    public function update($comment, $data)
    {
        $comment->update($data);

        return $comment;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
        $comment = $this->model->create($data);

        return $comment;
    }

    public function destroy($model)
    {
        return $model->delete();
    }


}
