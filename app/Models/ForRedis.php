<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForRedis extends Model
{
    use HasFactory;
    protected $table = 'for_redis';

    protected $guarded = false;
}
