<?php

namespace App\Models;

use App\Traits\Imgable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Sortable, HasFactory, Notifiable, Imgable;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'position_id',
        'status',
        'birth_date',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $dates = ['birth_date'];

    /**
     * @return BelongsTo
     */
    public function position() : BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
