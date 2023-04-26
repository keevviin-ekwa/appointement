<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public function type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class,'product_type_id');

    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class,'provider_id');
    }
}
