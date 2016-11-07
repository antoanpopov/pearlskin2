<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\AddressRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class AddressesComposer
{

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addresses = $addressRepository;
    }

    public function compose(View $view){
        $view->with('addresses', $this->addresses->allAddresses());
    }

}