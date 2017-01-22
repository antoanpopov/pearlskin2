<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Repositories;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentPriceListRepository extends EloquentBaseRepository implements Repositories\PriceListRepository
{

    /**
     *
     * @param array $data
     * @return mixed
     */
    public function create($data)
    {
        if(isset($data['procedure_id'])){
            $data['procedure_id'] = ($data['procedure_id'] === '')? null : $data['procedure_id'];
        }

        $entity = $this->model->create($data);

        return $entity;
    }

    /**
     *
     * @param $model
     * @param array $data
     * @return mixed
     */
    public function update($model, $data)
    {
        if(isset($data['procedure_id'])){
            $data['procedure_id'] = ($data['procedure_id'] === '')? null : $data['procedure_id'];
        }
        $model->update($data);

        return $model;
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('title', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('title', $slug)->where('locale', $locale)->first();
    }
}
