<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;





    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function appointment():BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
    public function cares():BelongsToMany
    {
        return  $this->belongsToMany(Care::class);
    }
}
