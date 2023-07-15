<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config("languages");

        foreach ($languages as $language) {
            $newLanguage = new Language();
            $newLanguage->name = $language['name'];
            $newLanguage->save();
        };
    }
}
