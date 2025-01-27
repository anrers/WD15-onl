<?php

namespace Database\Seeders;

use App\Models\tags\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag = new Tag();
        $tag->name = 'Home';
        $tag->save();
    }
}
