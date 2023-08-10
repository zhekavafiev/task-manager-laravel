<?php

use App\Model\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            ['success', 'white', 'Verified'],
            ['danger', 'white', 'Bugs'],
            ['warning', 'white', 'Check']
        ];

        foreach ($labels as [$color, $textColor, $text]) {
            Label::factory()->create([
                'color' => $color,
                'text_color' => $textColor,
                'text' => $text
            ]);
        }
    }
}
