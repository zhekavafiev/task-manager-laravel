<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Model\Task
 *
 * @property-read \App\Model\User|null $assigner
 * @property-read \App\Model\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Label> $label
 * @property-read int|null $label_count
 * @property-read \App\Model\TaskStatus|null $status
 * @method static \Database\Factories\Model\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    protected $primaryKey = 'id';

    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const DESCRIPTION_COLUMN = 'description';
    public const STATUS_ID_COLUMN = 'status_id';
    public const CREATOR_BY_ID_COLUMN = 'creator_by_id';
    public const ASSIGNED_BY_ID_COLUMN = 'assigned_to_id';

    public const LABEL_RELATION_TABLE = 'label_task';
    public const LABEL_RELATION_TABLE_KEY = 'task_id';

    protected $fillable = [
        self::NAME_COLUMN,
        self::DESCRIPTION_COLUMN,
        self::STATUS_ID_COLUMN,
        self::CREATOR_BY_ID_COLUMN,
        self::ASSIGNED_BY_ID_COLUMN,
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, self::CREATOR_BY_ID_COLUMN, User::ID_COLUMN);
    }

    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, self::ASSIGNED_BY_ID_COLUMN, User::ID_COLUMN);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class, self::STATUS_ID_COLUMN, TaskStatus::ID_COLUMN);
    }

    public function label(): BelongsToMany
    {
        return $this->belongsToMany(
            Label::class,
            self::LABEL_RELATION_TABLE,
            self::LABEL_RELATION_TABLE,
            Label::TASK_RELATION_TABLE_KEY
        );
    }
}
