<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForCache extends Model
{
    use HasFactory;

    protected $table = 'for_caches';

    protected $fillable = [
        'title',
        'context',
        'day_created',
        'for_cache_user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
