<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category3 extends Model
{
    use HasFactory;

    protected $table = 'category3_s';

    protected $fillable = [
        'title',
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function posts(): BelongsToMany{
        return $this->belongsToMany(Post3::class,
        'category3_s__post3_s',
        'category3_s_id',
        'post3_s_id');
    }
}
