<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(array $attributes)
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'details'
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
