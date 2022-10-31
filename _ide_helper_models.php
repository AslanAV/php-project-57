<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{

    use Database\Factories\LabelFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Label
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static LabelFactory factory(...$parameters)
 * @method static Builder|Label newModelQuery()
 * @method static Builder|Label newQuery()
 * @method static Builder|Label query()
 * @method static Builder|Label whereCreatedAt($value)
 * @method static Builder|Label whereId($value)
 * @method static Builder|Label whereUpdatedAt($value)
 */
	class Label extends Eloquent {}
}

namespace App\Models{

    use Database\Factories\TaskFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Task
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static TaskFactory factory(...$parameters)
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereUpdatedAt($value)
 */
	class Task extends Eloquent {}
}

namespace App\Models{

    use Database\Factories\TaskStatusFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\TaskStatus
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static TaskStatusFactory factory(...$parameters)
 * @method static Builder|TaskStatus newModelQuery()
 * @method static Builder|TaskStatus newQuery()
 * @method static Builder|TaskStatus query()
 * @method static Builder|TaskStatus whereCreatedAt($value)
 * @method static Builder|TaskStatus whereId($value)
 * @method static Builder|TaskStatus whereUpdatedAt($value)
 */
	class TaskStatus extends Eloquent {}
}

namespace App\Models{

    use Database\Factories\UserFactory;
    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravel\Sanctum\PersonalAccessToken;

    /**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 */
	class User extends Eloquent {}
}

