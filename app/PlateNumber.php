<?php

namespace App;

use App\Helpers\PlateNumberGenerator;
use App\Helpers\Utility;
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
        'user_id', 'updated_at'
    ];

    /**
     * Inverse relationship between plate number and user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Generates plate number(s)
     * @param $lgaCode
     * @param $qty
     */
    public static function generate($lgaCode, $qty = 1)
    {
        $lgaCode = strtoupper($lgaCode);
        for ($i = 0; $i < (int)$qty; $i++) {
            auth()->user()->plateNumbers()->create([
                'lga' => Utility::getLgaName($lgaCode),
                'code' => $lgaCode,
                'number' => PlateNumberGenerator::generate($lgaCode)
            ]);
        }
    }
}
