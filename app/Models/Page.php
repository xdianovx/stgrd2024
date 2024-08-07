<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description','text_right','text_left','video_preview','video_in_player'];
    public static $pages_routes = [
        'admin.pages.index',
        'admin.pages.search',
        'admin.pages.show',
        'admin.pages.edit',
        // 'admin.pages.create',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
