<?php

namespace App\Models;

use App\Traits\Buyer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Overtrue\LaravelFollow\Followable;
use PhpOffice\PhpSpreadsheet\RichText\RichText;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $user_name
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $otp
 * @property string $phone
 * @property int $phone_verified
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, Buyer;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'sheba',
        'is_private',
        'private_price',
        'phone',
        'phone_verified',
        'profile_image',
        'user_name',
        'otp',
        'category_id',
    ];

    protected $hidden = [
        'otp',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'receiver_id')
            ->whereNull('message_id')
            ->orderBy('id', 'DESC');
    }

    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function courses()
    {
        return $this->hasMany(Course::class)->orderBy('id', 'DESC');
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('id', 'DESC');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function toggleLike(Post $post): void
    {
        $this->hasLiked($post) ? $this->unLike($post) : $this->like($post);
    }


    public function like(Post $post): void
    {
        (new Like())
            ->user()->associate($this)
            ->post()->associate($post)
            ->save();
    }

    public function unLike(Post $post): void
    {
        $post->likes()
            ->whereHas('user', function ($q) {
                $q->whereId($this->id);
            })
            ->delete();
    }

    public function hasLiked(Post $post): bool
    {
        if (! $post->exists) {
            return false;
        }

        return $post->likes()
            ->whereHas('user', function ($q) {
                $q->whereId($this->id);
            })->exists();
    }

}
