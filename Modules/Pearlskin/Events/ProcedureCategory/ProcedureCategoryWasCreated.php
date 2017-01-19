<?php

namespace Modules\Pearlskin\Events\ProcedureCategory;

use Modules\Media\Contracts\StoringMedia;

class ProcedureCategoryWasCreated implements StoringMedia
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
