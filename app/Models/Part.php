<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'type',
        'delivery_time',
        'purchase_price',
        'sell_price'
    ];

    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class)->withPivot('quantity');
    }
}
