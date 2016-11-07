<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'pearlskin__clients';
    protected $fillable = ['names', 'phone', 'dob', 'email', 'address', 'created_by_user_id', 'updated_by_user_id'];

    protected $dates = ['created_at', 'updated_at', 'dob'];
}
