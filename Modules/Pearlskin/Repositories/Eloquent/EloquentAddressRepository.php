<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Repositories\AddressRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentAddressRepository extends EloquentBaseRepository implements AddressRepository
{
    public function allAddresses()
    {
        return $this->model->get();
    }
}
