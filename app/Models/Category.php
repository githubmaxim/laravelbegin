<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'slug',
        'title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

 //Для работы прямой связи при OneToOne
    public function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }

}
