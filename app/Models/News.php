<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','image','description','content'];
    public static $news_routes = [
        'admin.news.index',
        'admin.news.search',
        'admin.news.show',
        'admin.news.edit',
        'admin.news.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projects()
    {
      return $this->belongsToMany(Project::class, 'project_news', 'news_id', 'project_id');
    }
}
