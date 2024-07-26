<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post3 extends Model
{
    use HasFactory;

    protected $table = 'post3_s';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category3::class,
            'category3_s__post3_s',
            'post3_s_id',
            'category3_s_id'
        );
    }
}
