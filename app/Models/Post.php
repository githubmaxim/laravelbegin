<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'slug',
        'title',
        'status',
        'content',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
