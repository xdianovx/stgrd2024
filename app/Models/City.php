<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];
    public static $cities_routes = [
        'admin.cities.index',
        'admin.cities.search',
        'admin.cities.show',
        'admin.cities.edit',
        'admin.cities.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function projects()
    {
      return $this->hasMany(Project::class);
    }

    public function vacancys()
    {
      return $this->hasMany(Vacancy::class);
    }
}
