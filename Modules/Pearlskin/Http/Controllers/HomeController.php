<?php
namespace Modules\Pearlskin\Http\Controllers;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Pearlskin\Repositories\AddressRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/25/16
 * Time: 8:56 PM
 */
class HomeController extends BasePublicController
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
            $this->addressRepository = $addressRepository;
            parent::__construct();
    }

    public function index()
    {
        die();
        $addresses = $this->addressRepository->allAddresses();

        return view('home', compact('addresses'));
    }

}