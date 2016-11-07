<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\Doctor;
use Modules\Media\Contracts\StoringMedia;

class DoctorWasCreated implements StoringMedia
{
    /**
     * @var Doctor
     */
    public $doctor;
    /**
     * @var array
     */
    public $data;

    public function __construct($doctor, array $data)
    {
        $this->doctor = $doctor;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->doctor;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
