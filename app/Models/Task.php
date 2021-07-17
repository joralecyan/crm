<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var string[]
     */
    protected $fillable = ['board_id', 'name', 'description', 'status', 'order'];

    /**
     * @return BelongsTo
     */
    public function board() :BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
