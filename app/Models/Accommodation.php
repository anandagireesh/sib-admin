<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "price",
        "logo",
        "contact_number",
        "whatsaapp_number",
        "location",
        "city",
        "state",
        "country",
        "latitude",
        "longitude",
        "rating",
    ];

    protected $table = "accommodations";
}
