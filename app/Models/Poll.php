<?php

namespace App\Models;

use App\Models\Contracts\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $field, string $value)
 * @method static find(string $pollId)
 */
class Poll extends BaseModel
{
    use HasFactory;

    protected $table = 'polls';

    protected $fillable = [
        'id',
        'description',
        'finished',
        'finished_at',
        'user_id'
    ];

    protected $casts = [
        'finished_at' => 'datetime:Y-m-d H:00'
    ];

    /**
     * @param $date
     * @return void
     */
    public function setFinishedAtAttribute($date)
    {
        $this->attributes['finished_at'] = empty($date) ? null : Carbon::parse($date)->toDateString();
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}
