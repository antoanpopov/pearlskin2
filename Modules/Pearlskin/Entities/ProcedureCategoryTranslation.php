<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class ProcedureCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'description'];
    protected $table = 'pearlskin__procedures_cats_trans';
}
