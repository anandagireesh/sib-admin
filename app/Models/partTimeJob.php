<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partTimeJob extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "logo",
        "place",
    ];

    protected $table ='part_time_jobs';
}
