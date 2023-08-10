<?php

use App\Model\TaskStatus;
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
        TaskStatus::factory()->create(['name' => $defaultStatus]);

        $baseStatuses = ['In work', 'On testing', 'Finished'];

        foreach ($baseStatuses as $baseStatus) {
            TaskStatus::factory()->create(['name' => $baseStatus]);
        }
    }
}
