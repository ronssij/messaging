<?php

namespace Database\Seeders;

use App\Models\Context;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedContexts();
    }

    private function seedContexts()
    {
        $raw = file_get_contents(resource_path('json/contexts.json'));
        $contexts = collect(json_decode($raw, true));

        $contexts->each(function ($context) {
            Context::firstOrCreate($context);

            echo "Context:[".$context['context']."] created \n";
        });
    }
}
