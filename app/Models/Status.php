<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];
    public static $statuses_routes = [
        'admin.statuses.index',
        'admin.statuses.search',
        'admin.statuses.show',
        'admin.statuses.edit',
        'admin.statuses.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function projects()
    {
      return $this->hasMany(Project::class);
    }
}
