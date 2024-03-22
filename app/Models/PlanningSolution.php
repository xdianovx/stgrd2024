<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanningSolution extends Model
{
  use HasFactory;
  protected $fillable = [
    'type',
    'square',
    'ipoteka',
    'price',
    'slug',
    'plan',
    'project_block_id'
  ];
  public static $planning_solution_routes = [
    'admin.projects.planning_solution_show',
    'admin.projects.planning_solution_edit',
    'admin.projects.planning_solution_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
}
