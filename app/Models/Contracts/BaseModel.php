<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = true;
}
