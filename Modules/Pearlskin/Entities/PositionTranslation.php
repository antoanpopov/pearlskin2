<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class PositionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'pearlskin__positions_translations';
}
