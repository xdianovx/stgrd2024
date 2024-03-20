<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
  use HasFactory;
  protected $fillable = ['title','slug','image','description','content'];
  public static $promotions_routes = [
      'admin.promotions.index',
      'admin.promotions.search',
      'admin.promotions.show',
      'admin.promotions.edit',
      'admin.promotions.create',
  ];
  public function getRouteKeyName()
  {
      return 'slug';
  }
  public function projects()
  {
      return $this->belongsToMany(Project::class);

  }
}
