<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlateNumber extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Inverse relationship between plate number and user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plateNumber()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
