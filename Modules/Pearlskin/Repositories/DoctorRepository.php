<?php namespace Modules\Pearlskin\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;

interface DoctorRepository extends BaseRepository
{

    /**
     * @return Collection
     */
    public function allDoctors();

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByNamesInLocale($slug, $locale);
}
