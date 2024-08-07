<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

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

    //Для работы обратной связи при OneToOne
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
