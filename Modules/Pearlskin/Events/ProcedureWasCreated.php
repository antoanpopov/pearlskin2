<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\Procedure;
use Modules\Media\Contracts\StoringMedia;

class ProcedureWasCreated implements StoringMedia
{
    /**
     * @var Procedure
     */
    public $procedure;
    /**
     * @var array
     */
    public $data;

    public function __construct($procedure, array $data)
    {
        $this->procedure = $procedure;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->procedure;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
