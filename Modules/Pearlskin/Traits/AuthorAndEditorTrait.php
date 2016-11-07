<?php
namespace Modules\Pearlskin\Traits;
use Modules\User\Entities\Sentinel\User;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/17/16
 * Time: 1:59 PM
 */

trait AuthorAndEditorTrait {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function editor()
    {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id');
    }

}