<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Block;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Admin',
      'email' => 'Admin@gmail.com',
      'password' => 'aspire5745g',
    ]);

    Block::truncate();

    $blocks = [
      [
        'title_left' => 'Миссия',
        'slug' => 'mission',
        'active' => true,
      ],
      [
        'title_left' => 'Преимущества компании',
        'slug' => 'company_advantages',
        'active' => true,
      ]
    ];

    foreach ($blocks as $key => $value) {
      Block::create($value);
    }

    Page::truncate();

    $pages = [
      [
        'title' => 'Home',
        'slug' => 'home',
      ],
      [
        'title' => 'About',
        'slug' => 'about',
      ],
      [
        'title' => 'Projects',
        'slug' => 'projects',
      ],
      [
        'title' => 'News',
        'slug' => 'news',
      ],
      [
        'title' => 'Stock',
        'slug' => 'stock',
      ],
      [
        'title' => 'Team',
        'slug' => 'team',
      ],
      [
        'title' => 'Vacancy',
        'slug' => 'vacancy',
      ],
      [
        'title' => 'Contacts',
        'slug' => 'contacts',
      ],
    ];

    foreach ($pages as $key => $value) {
      Page::create($value);
    }
  }
}
