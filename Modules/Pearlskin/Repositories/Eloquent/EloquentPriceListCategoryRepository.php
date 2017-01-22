<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Repositories;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentPriceListCategoryRepository extends EloquentBaseRepository implements Repositories\PriceListCategoryRepository
{

    public function allWithPriceLists()
    {
        $this->model->with('procedures')->get();
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
