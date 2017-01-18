<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Carbon\Carbon;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Pearlskin\Entities;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentClientRepository extends EloquentBaseRepository implements ClientRepository
{

    /**
     * Create a blog post
     * @param  array $data
     * @return Entities\Client
     */
    public function create($data)
    {
        $data['dob'] = Carbon::parse($data['dob']);
        $entity = $this->model->create($data);

        return $entity;
    }

}
