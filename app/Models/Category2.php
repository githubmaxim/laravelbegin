<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category2 extends Model
{
    use HasFactory;

    protected $table = 'category2_s';

    protected $fillable = [
        'slug',
        'title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //Для работы прямой связи при ManyToOne
    public function posts(): HasMany
    {
        return $this->hasMany(Post2::class, 'category2_s_id');
    }
}
