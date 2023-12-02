<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'value',
        'dueDate',
        'payment',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
