<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class CarouselTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
    protected $table = 'pearlskin__carousels_translations';
}
