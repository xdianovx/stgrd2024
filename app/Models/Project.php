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
    'poster',
    'text',
    'text_card',
    'link',
    'link_title',
    'presentation',

    'address',
    'flats',
    'deadline',
    'interior',
    'floors',
    'corpuses',

    'city_id',
    'status_id'
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
  public function blocks()
  {
    return $this->hasMany(Block::class);
  }
  public function news()
  {
      return $this->belongsToMany(News::class, 'project_news', 'project_id', 'news_id');
  }
  public function promotions()
  {
      return $this->belongsToMany(Promotion::class);

  }
  public function createBlocks(array $attributes)
  {
    foreach ($attributes as $key => $value):
      $this->blocks()->create($value);
    endforeach;
  }
}
