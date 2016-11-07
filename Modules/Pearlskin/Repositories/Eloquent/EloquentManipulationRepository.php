<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\Manipulation;
use Modules\Pearlskin\Repositories\ManipulationRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentManipulationRepository extends EloquentBaseRepository implements ManipulationRepository
{

    /**
     * @param  int    $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->with('procedures')->find($id);
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Manipulation
     */
    public function create($data)
    {
        $manipulation = $this->model->create($data);

        $manipulation->procedures()->sync(array_get($data, 'procedures', []));

        return $manipulation;
    }

    /**
     * Update a resource
     * @param $manipulation
     * @param  array $data
     * @return mixed
     */
    public function update($manipulation, $data)
    {
        $manipulation->update($data);

        $manipulation->procedures()->sync(array_get($data, 'procedures', []));

        return $manipulation;
    }
}
