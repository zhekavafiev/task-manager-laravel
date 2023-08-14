<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Model\Team
 *
 * @property int $id
 * @property string $name
 * @property string|null $components
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereComponents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $primaryKey = 'id';

    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const COMPONENTS_COLUMN = 'components';

    public const USER_RELATION_TABLE = 'team_user';
    public const USER_RELATION_TABLE_KEY = 'team_id';

    protected $fillable = [
        self::NAME_COLUMN,
        self::COMPONENTS_COLUMN,
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            self::USER_RELATION_TABLE,
            self::USER_RELATION_TABLE_KEY,
            User::TEAM_RELATION_TABLE_KEY
        );
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, Task::TEAM_ID_COLUMN, self::ID_COLUMN);
    }
}
