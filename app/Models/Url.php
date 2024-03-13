<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
                            'orginal_url',
                            'short_url',
                            'algorythm',
                            'is_active'
                        ];
}
