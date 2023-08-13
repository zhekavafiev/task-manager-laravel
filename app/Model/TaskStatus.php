<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Model\TaskStatus
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Task> $tasks
 * @property-read int|null $tasks_count
 * @method static \Database\Factories\Model\TaskStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TaskStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskStatus whereName($value)
 * @mixin \Eloquent
 */
class TaskStatus extends Model
{
    use HasFactory;

    protected $table = 'task_statuses';
    protected $primaryKey = 'id';

    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';

    public $timestamps = false;

    protected $fillable = [
        self::NAME_COLUMN
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, Task::STATUS_ID_COLUMN, self::ID_COLUMN);
    }
}
