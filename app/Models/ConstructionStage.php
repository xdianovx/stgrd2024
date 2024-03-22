<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionStage extends Model
{
  use HasFactory;
  protected $fillable = [
  'date',
  'image',
  'project_block_id'
  ];
  public static $construction_stage_routes = [
      'admin.projects.construction_stage_routes_show',
      'admin.projects.construction_stage_routes_edit',
      'admin.projects.construction_stage_routes_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
}
