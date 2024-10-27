<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'slug',
    'image',
    'year_delivery',
    'description',
    'link',
    'number_rooms',
    'status_id',
    'city_id',
    'comfort',
    'home'
  ];
  public static $projects_routes = [
    'admin.projects.index',
    'admin.projects.search',
    'admin.projects.show',
    'admin.projects.edit',
    'admin.projects.create',
  ];
  public function getRouteKeyName()
  {
      return 'slug';
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }
  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function planningSolutions()
  {
    return $this->hasMany(PlanningSolution::class);
  }
}
