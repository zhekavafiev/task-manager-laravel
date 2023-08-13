<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * App\Model\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\Model\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Task> $tasks
 * @property-read int|null $tasks_count
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const EMAIL_COLOR_COLUMN = 'email';
    public const EMAIL_VERIFIED_AT_COLUMN = 'email_verified_at';
    public const PASSWORD_COLUMN = 'password';
    public const REMEMBER_TOKEN_COLUMN = 'password';
    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';

    protected $fillable = [
        self::NAME_COLUMN,
        self::EMAIL_COLOR_COLUMN,
        self::EMAIL_VERIFIED_AT_COLUMN,
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT_COLUMN => 'datetime',
        self::CREATED_AT_COLUMN => 'datetime',
        self::UPDATED_AT_COLUMN => 'datetime',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, Task::CREATOR_BY_ID_COLUMN, self::ID_COLUMN);
    }
}
