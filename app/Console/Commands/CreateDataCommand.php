<?php

namespace App\Console\Commands;

use App\Model\Label;
use App\Model\Task;
use App\Model\TaskStatus;
use App\Model\Team;
use App\Model\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

final class CreateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:baseDatabaseData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a marketing email to a user';

    /**
     * @throws \Throwable
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $statuses = TaskStatus::factory(5)->create();
            $statusIds = $statuses->pluck('id');

            $labels = Label::factory(10)->create();
            $labelIds = $labels->pluck('id');

            $users = User::factory(30)->create();
            $userIds = $users->pluck('id');

            $teams = Team::factory(10)->create();
            $teamIds = $teams->pluck('id');

            $teams->each(function (Team $team) use ($userIds) {
                $team->users()->attach($userIds->shuffle()->take(random_int(2, 10)));
            });


            for ($i = 0; $i < 100; $i++) {
                /**
                 * @var Task $task
                 */
                $task = Task::factory()->create([
                    Task::STATUS_ID_COLUMN => $statusIds->random(),
                    Task::CREATOR_BY_ID_COLUMN => $userIds->random(),
                    Task::ASSIGNED_BY_ID_COLUMN => $userIds->random(),
                    Task::TEAM_ID_COLUMN => random_int(1, 3) == 2 ? $teamIds->random() : null
                ]);

                $countLabels = random_int(0, 3);
                $labelsOnTask = collect();
                for ($j = 0; $j < $countLabels; $j++) {
                    $labelsOnTask->push($labelIds->random());
                }
                $task->label()->attach($labelsOnTask->unique()->values()->all());
            }
        });

    }
}
