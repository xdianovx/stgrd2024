<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapPoint extends Model
{
  use HasFactory;
  protected $fillable = [
    'title',
    // 'type',
    'coordinates_latitude',
    'coordinates_longitude',
    'project_block_id'
  ];
  public static $map_point_routes = [
      'admin.projects.map_point_show',
      'admin.projects.map_point_edit',
      'admin.projects.map_point_create',
  ];
  public function project_blocks()
  {
    return $this->belongsTo(Block::class);
  }
}
