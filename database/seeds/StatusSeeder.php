<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseStatuses = ['New', 'In work', 'On testing', 'Finished'];

        foreach ($baseStatuses as $baseStatus) {
            factory(TaskStatus::class)->create(['name' => $baseStatus]);
        }
    }
}
