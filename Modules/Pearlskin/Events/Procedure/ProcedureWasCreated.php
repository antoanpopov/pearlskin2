<?php

namespace Modules\Pearlskin\Events\Procedure;

use Modules\Media\Contracts\StoringMedia;

class ProcedureWasCreated implements StoringMedia
{
    private $recipe;
    private $data;

    public function __construct($recipe, $data)
    {
        $this->recipe = $recipe;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->recipe;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}