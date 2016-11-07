<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Carousel extends Model
{
    use Translatable,
        MediaRelation;
    
    protected $table = 'pearlskin__carousels';
    public $translatedAttributes = ['title', 'description'];
    protected $fillable = [
        'is_visible',
        'page_id',
        // Translatable fields
        'title',
        'description',
        'created_at',
        'updated_at',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];
}
