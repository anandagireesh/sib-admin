<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'university',
        'place',
        'logo',
    ];

    protected $table = 'universities';

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseCategories()
    {
        return $this->hasMany(CourseCategory::class);
    }

    public function colleges()
    {
        return $this->hasMany(College::class);
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function getUniversities($search = null)
    {
        $universities = University::select('universities.id', 'universities.university', 'cities.name as place', 'universities.logo')->LEFTJOIN('cities', 'universities.place', '=', 'cities.id');
        if ($search) {
            $universities->where('universities.university', 'like', '%' . $search . '%');
        }
        return $universities;
    }
}
