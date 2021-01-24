<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable;

class Position extends Model
{
    use Sortable, HasFactory;

    /**
     * @var string
     */
    protected $table = 'positions';

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'description'];

    /**
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
