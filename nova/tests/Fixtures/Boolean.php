<?php

namespace Laravel\Nova\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class Boolean extends Model
{
    use Actionable;

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [];
}
