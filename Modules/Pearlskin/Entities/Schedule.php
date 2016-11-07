<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Pearlskin\Traits\AuthorAndEditorTrait;

class Schedule extends Model
{
    use AuthorAndEditorTrait;
    
    protected $table = 'pearlskin__schedules';
    protected $fillable = [
        'client_id',
        'doctor_id',
        'appointed_at',
        'created_at',
        'updated_at',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    protected $dates = ['created_at', 'updated_at', 'appointed_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
