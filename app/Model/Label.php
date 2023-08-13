<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Model\Label
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Task> $task
 * @property-read int|null $task_count
 * @method static \Database\Factories\Model\LabelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Label newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Label newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Label query()
 * @mixin \Eloquent
 */
class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $primaryKey = 'id';

    public const ID_COLUMN = 'id';
    public const TEXT_COLUMN = 'text';
    public const TEXT_COLOR_COLUMN = 'text_color';
    public const COLOR_COLUMN = 'color';

    public const TASK_RELATION_TABLE = 'label_task';
    public const TASK_RELATION_TABLE_KEY = 'label_id';

    public $timestamps = false;

    protected $fillable = [
        self::TEXT_COLUMN,
        self::TEXT_COLOR_COLUMN,
        self::COLOR_COLUMN,
    ];

    public function task(): BelongsToMany
    {
        return $this->belongsToMany(
            Task::class,
            self::TASK_RELATION_TABLE,
            self::TASK_RELATION_TABLE_KEY,
            Task::LABEL_RELATION_TABLE_KEY
        );
    }
}
