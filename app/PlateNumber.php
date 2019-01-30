<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlateNumber extends Model
{

    const PER_PAGE = 8;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'created_at', 'updated_at'
    ];

    /**
     * Inverse relationship between plate number and user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plateNumber()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
