<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Admin;
use App\Models\User;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'userdetails';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'flight_id',
        'fullname',
        'phonenumber',
        'dari',
        'ke',
        'tanggal',
        'maskapai',
        'jumlah_penumpang',
        'email',
        'total_price'
    ];

    /**
     * The attributes that should be unique on the model.
     *
     * @var array
     */

    /**
     * Get the user that owns the user detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the flight associated with the user detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flight(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
