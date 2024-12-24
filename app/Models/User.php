<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'password',
        'image',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];
    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'follower_user','follower_id','user_id')->withTimestamps();
    }
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'follower_user','user_id','follower_id')->withTimestamps();
    }
    public function follows(User $user)
    {
        return $this->followings()->where('user_id',$user->id)->exists();
    }
    public function getImageUrl()
    {
        if ($this->image){
            return url('storage/'. $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
    }
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Idea::class,'idea_like')->withTimestamps();
    }
    public function isLike(Idea $idea)
    {
        return $this->likes()->where('idea_id',$idea->id)->exists();
    }
}
