<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'boards';

    /**
     * @var string[]
     */
    protected $fillable = ['project_id', 'name', 'order'];

    /**
     * @return BelongsTo
     */
    public function project() :BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return HasMany
     */
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }
}
