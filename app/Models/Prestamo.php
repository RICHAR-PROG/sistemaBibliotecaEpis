<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;

 
    public function libro(): BelongsTo
    {
        return $this->belongsTo( Libro::class );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
