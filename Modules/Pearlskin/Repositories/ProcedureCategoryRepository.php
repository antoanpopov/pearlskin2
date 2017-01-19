<?php namespace Modules\Pearlskin\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;

interface ProcedureCategoryRepository extends BaseRepository
{
    /**
     * @return Collection
     */
    public function allProcedureCategories();

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale);
}
