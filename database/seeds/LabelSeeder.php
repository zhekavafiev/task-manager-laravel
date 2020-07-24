<?php

use App\Label;
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
            ['green', 'black', 'Good'],
            ['red', 'black', 'Bad'],
            ['yellow', 'black', 'Normal']
        ];

        foreach ($labels as [$color, $textColor, $text]) {
            factory(Label::class)->create([
                'color' => $color,
                'text_color' => $textColor,
                'text' => $text
            ]);
        }
    }
}
