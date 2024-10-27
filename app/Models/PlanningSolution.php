<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanningSolution extends Model
{
  use HasFactory;
  protected $fillable = [
    'number_rooms',
    'number_square_meters',
    'price',
    'project_id',
  ];
  public static $planning_solution_routes = [
    'admin.projects.planning_solution_show',
    'admin.projects.planning_solution_edit',
    'admin.projects.planning_solution_create',
  ];

  public function project()
  {
    return $this->belongsTo(Project::class);
  }
}
