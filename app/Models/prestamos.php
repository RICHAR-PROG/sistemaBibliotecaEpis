<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reportes;

class User extends Model
{
    public function libros()
    {
        return $this->belongsToMany(Libros::class, 'prestamos')
                    ->withPivot('fecha_prestamo', 'fecha_devolucion')
                    ->withTimestamps();
    }
}

class Libro extends Model
{
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'prestamos')
                    ->withPivot('fecha_prestamo', 'fecha_devolucion')
                    ->withTimestamps();
    }
}

class prestamos extends Model
{
    use HasFactory;
}
