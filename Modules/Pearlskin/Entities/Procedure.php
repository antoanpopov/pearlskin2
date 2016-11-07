<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Procedure extends Model
{
    use Translatable,
        MediaRelation;

    protected $table = 'pearlskin__procedures';
    public $translatedAttributes = ['title', 'description'];
    protected $fillable = [
        'price',
        'created_by_user_id',
        'updated_by_user_id',
        'is_visible',
        // Translatable fields
        'title',
        'description',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
