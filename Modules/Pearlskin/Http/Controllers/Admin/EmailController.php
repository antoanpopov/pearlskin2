<?php

namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pearlskin\Emails\QuestionAsked;
use Modules\Pearlskin\Entities\EmailMessage;
use Modules\Pearlskin\Repositories\EmailMessageRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\Mail;

class EmailController extends AdminBaseController
{
    /**
     * @var EmailMessageRepository
     */
    private $emailMessageRepository;

    public function __construct(EmailMessageRepository $emailMessageRepository)
    {
        parent::__construct();

        $this->emailMessageRepository = $emailMessageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emails = $this->emailMessageRepository->allParents();

        return view('pearlskin::admin.emails.index', compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->emailMessageRepository->create($request->all());
        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::emails.title.emails')]));

        return redirect()->route('admin.pearlskin.doctor.index');
    }

    /**
     * @param EmailMessage $emailMessage
     * @return Response
     */
    public function reply(EmailMessage $emailMessage)
    {

        if (!$emailMessage->is_read) {
            $this->emailMessageRepository->update($emailMessage, ['is_read' => true]);
        }
        
        foreach ($emailMessage->replies as $reply){
            if(!$reply->is_read){
                $this->emailMessageRepository->update($reply,['is_read' => true]);
            }
        }

        $replyEmail = new EmailMessage();
        $replyEmail->receiver_email = $emailMessage->sender_email;
        $replyEmail->sender_email = setting('pearlskin::email-inbox');
        $replyEmail->sender_names = setting('pearlskin::email-sender', locale());
        $replyEmail->message_subject = sprintf("RE: %s", $emailMessage->message_subject);

        Mail::send(new QuestionAsked($replyEmail));
        return view('pearlskin::admin.emails.reply', compact('emailMessage', 'replyEmail'))
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::emails.title.emails')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Doctor $doctor
     * @param  Request $request
     * @return Response
     */
    public function update(Doctor $doctor, Request $request)
    {
        $this->doctor->update($doctor, $request->all());

        return redirect()->route('admin.pearlskin.doctor.index')->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::doctors.title.doctors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Doctor $doctor
     * @return Response
     */
    public function destroy(Doctor $doctor)
    {
        $this->doctor->destroy($doctor);


        return redirect()->route('admin.pearlskin.doctor.index')->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::doctors.title.doctors')]));
    }
}
