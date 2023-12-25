<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = new Language();
        $language->flag = "flags/united-states.svg";
        $language->name = "english";
        $language->excerpt = "en";
        $language->save();

        $language = new Language();
        $language->flag = "flags/iran.svg";
        $language->name = "persian";
        $language->excerpt = "fa";
        $language->save();
    }
}
