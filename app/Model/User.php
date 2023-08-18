<?php

namespace App\Model;

use App\Helpers\ImageFullPathGetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Model\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $second_name
 * @property string $birthday
 * @property string $country
 * @property string|null $city
 * @property int $user_role_id
 * @property string|null $avatar
 * @property string|null $phone
 * @property string|null $telegram
 * @property string|null $github
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Model\UserRole|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Model\Team> $teams
 * @property-read int|null $teams_count
 * @method static \Database\Factories\Model\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRoleId($value)
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
    public const SECOND_COLUMN = 'second_name';
    public const EMAIL_COLUMN = 'email';
    public const PHONE_COLUMN = 'phone';
    public const TELEGRAM_COLUMN = 'telegram';
    public const GITHUB_COLUMN = 'github';
    public const COUNTRY_COLUMN = 'country';
    public const CITY_COLUMN = 'city';
    public const AVATAR_COLUMN = 'avatar';
    public const USER_ROLE_ID_COLUMN = 'user_role_id';
    public const PASSWORD_COLUMN = 'password';
    public const REMEMBER_TOKEN_COLUMN = 'remember_token';
    public const EMAIL_VERIFIED_AT_COLUMN = 'email_verified_at';
    public const BIRTHDAY_COLUMN = 'birthday';
    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';

    public const ADMIN_ROLE = 1;
    public const USER_ROLE = 2;

    public const TEAM_RELATION_TABLE = 'team_user';
    public const TEAM_RELATION_TABLE_KEY = 'user_id';

    protected $fillable = [
        self::NAME_COLUMN,
        self::SECOND_COLUMN,
        self::EMAIL_COLUMN,
        self::PHONE_COLUMN,
        self::TELEGRAM_COLUMN,
        self::GITHUB_COLUMN,
        self::COUNTRY_COLUMN,
        self::CITY_COLUMN,
        self::AVATAR_COLUMN,
        self::USER_ROLE_ID_COLUMN,
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
        self::EMAIL_VERIFIED_AT_COLUMN,
        self::BIRTHDAY_COLUMN
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
        self::BIRTHDAY_COLUMN => 'datetime',
        self::EMAIL_VERIFIED_AT_COLUMN => 'datetime',
        self::CREATED_AT_COLUMN => 'datetime',
        self::UPDATED_AT_COLUMN => 'datetime',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, Task::CREATOR_BY_ID_COLUMN, self::ID_COLUMN);
    }

    public function isAdmin(): bool
    {
        return $this->user_role_id === self::ADMIN_ROLE;
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            Team::class,
            self::TEAM_RELATION_TABLE,
            self::TEAM_RELATION_TABLE_KEY,
            Team::USER_RELATION_TABLE_KEY
        );
    }

    public function role(): HasOne
    {
        return $this->hasOne(UserRole::class, self::USER_ROLE_ID_COLUMN, UserRole::ID_COLUMN);
    }

    public function avatar()
    {
        return ImageFullPathGetter::getFullPath('avatar/' . $this->avatar);
    }
}
