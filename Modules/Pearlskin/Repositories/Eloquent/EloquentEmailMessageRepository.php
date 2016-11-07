<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Pearlskin\Entities\EmailMessage;
use Modules\Pearlskin\Repositories\EmailMessageRepository;

class EloquentEmailMessageRepository extends EloquentBaseRepository implements EmailMessageRepository
{

    /**
     * Count all records
     * @return int
     */
    public function countUnread()
    {
        return $this->model->where('is_read',0)->count();
    }

    public function countUnreadReplies(EmailMessage $emailMessage){
        return $this->model->replies()->where('is_read',0)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allParents()
    {
        return $this->model->parent()->orderBy('created_at', 'DESC')->get();
    }

    public function create($data)
    {

        $emailMessage = $this->model->create($data);

        return $emailMessage;
    }


}
