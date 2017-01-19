<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class ProcedureCategory extends Model
{
    use Translatable,
        MediaRelation;

    protected $table = 'pearlskin__procedures_cats';
    public $translatedAttributes = ['title', 'description'];
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id',
        'is_visible',
        'sort_order',
        // Translatable fields
        'title',
        'description',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
