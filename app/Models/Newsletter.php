<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'mailing_status'];

    public static $newsletter_routes = [
      'admin.newsletters.index',
      'admin.newsletters.search',
      'admin.newsletters.show'
      ];
}
