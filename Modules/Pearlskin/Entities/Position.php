<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use Translatable;
    
    protected $table = 'pearlskin__positions';
    public $translatedAttributes = ['title'];
    protected $fillable = [
        'slug',
        'created_at',
        'updated_at',
        'created_by_user_id',
        'updated_by_user_id',
        
        // Translatable fields
        'title'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
