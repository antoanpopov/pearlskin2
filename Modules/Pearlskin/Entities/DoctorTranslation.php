<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['names', 'description'];
    protected $table = 'pearlskin__doctors_translations';
}
