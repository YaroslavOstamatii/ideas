<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * App\Models\Idea
 *
 * @property int $id
 * @property string $content
 * @property int $likes
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Idea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Idea query()
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Idea whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Idea extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'idea_content',
            'user_id',
        ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
//    protected function content(): Attribute
//    {
//        return Attribute::make(
//            get: fn($value) => ucfirst($value),
//            set: fn($value) => Str::lower($value),
//        );
//    }
    public function likes(): BelongsToMany
    {
       return $this->belongsToMany(User::class,'idea_like')->withTimestamps();
    }
}
