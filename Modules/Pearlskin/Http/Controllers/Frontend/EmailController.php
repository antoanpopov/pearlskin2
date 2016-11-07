<?php

namespace Modules\Pearlskin\Http\Controllers\Frontend;

use App\Http\Requests\Request;
use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Contracts\Foundation\Application;
use Modules\Pearlskin\Http\Requests\AskQuestionEmailRequest;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/25/16
 * Time: 8:56 PM
 */
class EmailController extends BasePublicController
{
    /**
     * @var Application
     */
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
        parent::__construct();
    }

    public function askQuestion(AskQuestionEmailRequest $request){

    }
}