<?php
namespace Modules\Pearlskin\Http\Controllers\Frontend;

use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Contracts\Foundation\Application;
use Modules\Pearlskin\Emails\QuestionAsked;
use Modules\Pearlskin\Entities\EmailMessage;
use Modules\Pearlskin\Http\Requests\AskQuestionEmailRequest;
use Illuminate\Support\Facades\Mail;
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

    public function askQuestion(AskQuestionEmailRequest $request)
    {

        $replyEmail = new EmailMessage();
        $replyEmail->receiver_email = setting('pearlskin::email-inbox');
        $replyEmail->sender_email = $request->email;
        $replyEmail->sender_names = $request->name;
        $replyEmail->message_subject = sprintf("RE: %s", $request->message);
        Mail::send(new QuestionAsked($replyEmail));

        return redirect()->back()->withSuccess(trans('pearlskin::mail.message sent'));
    }
}
