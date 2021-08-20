<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

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

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
        self::updating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Uuid::generate(4);
            }
        });
    }

    /**
     * Get the user that made this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
