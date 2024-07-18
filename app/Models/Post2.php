<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post2 extends Model
{
    use HasFactory;

    protected $table = 'post2_s';

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

    //Для работы обратной связи при OneToMany
    public function category(): BelongsTo{
        return $this->belongsTo(Category2::class, 'category2_s_id');
    }
}
