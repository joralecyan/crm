<?php

namespace App\Models;

use App\Traits\Imgable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use Sortable, HasFactory, Imgable;

    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'name', 'description', 'image'];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
