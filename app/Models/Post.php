<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Post extends Model implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use Likeable;
    use SoftDeletes;
    use Uuid;

    protected $removeViewsOnDelete = true;

    protected $primaryKey = 'uuid';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'active',
        'user_id',
    ];

    /**
     * Get the user that made this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
