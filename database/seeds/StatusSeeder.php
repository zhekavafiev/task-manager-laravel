<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultStatus = 'New';
        factory(TaskStatus::class)->create(['name' => $defaultStatus]);

        $baseStatuses = ['In work', 'On testing', 'Finished'];

        foreach ($baseStatuses as $baseStatus) {
            factory(TaskStatus::class)->create(['name' => $baseStatus]);
        }
    }
}
