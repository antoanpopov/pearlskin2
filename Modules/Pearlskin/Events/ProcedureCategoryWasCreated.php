<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\ProcedureCategory;
use Modules\Media\Contracts\StoringMedia;

class ProcedureCategoryWasCreated implements StoringMedia
{
    /**
     * @var ProcedureCategory
     */
    public $procedureCategory;
    /**
     * @var array
     */
    public $data;

    public function __construct($procedureCategory, array $data)
    {
        $this->procedureCategory = $procedureCategory;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->procedureCategory;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}
