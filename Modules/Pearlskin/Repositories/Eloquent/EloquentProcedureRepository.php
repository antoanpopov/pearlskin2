<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\Procedure;
use Modules\Pearlskin\Events\ProcedureWasCreated;
use Modules\Pearlskin\Repositories\ProcedureRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentProcedureRepository extends EloquentBaseRepository implements ProcedureRepository
{

    public function create($data)
    {

        $procedure = $this->model->create($data);
        event(new ProcedureWasCreated($procedure, $data));

        return $procedure;
    }

    public function allProcedures()
    {
        return Procedure::paginate(6);
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
