<?php

namespace Modules\Pearlskin\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;

interface AddressRepository extends BaseRepository
{
    /**
     * @return Collection
     */
    public function allAddresses();
}
