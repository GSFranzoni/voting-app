<?php

namespace App\Models;

use App\Models\Contracts\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(string $pollOption)
 */
class PollOption extends BaseModel
{
    use HasFactory;

    protected $table = 'poll_options';

    protected $fillable = [
        'id',
        'description',
        'poll_id'
    ];

    /**
     * @return BelongsTo
     */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}
