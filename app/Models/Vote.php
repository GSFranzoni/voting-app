<?php

namespace App\Models;

use App\Models\Contracts\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends BaseModel
{
    use HasFactory;

    protected $table = 'votes';

    protected $fillable = [
        'id',
        'user_id',
        'poll_option_id'
    ];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function pollOption()
    {
        return $this->belongsTo(PollOption::class);
    }
}
