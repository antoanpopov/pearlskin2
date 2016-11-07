<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Doctor extends Model
{
    use Translatable,
        MediaRelation;

    protected $table = 'pearlskin__doctors';
    public $translatedAttributes = ['names', 'description'];
    protected $fillable = [
        'is_visible',
        'has_percent',
        'phone',
        // Translatable fields
        'names',
        'description',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];


    protected $dates = ['created_at', 'updated_at'];
}
