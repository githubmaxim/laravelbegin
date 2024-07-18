<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForValidMain extends Model
{
    use HasFactory;

    protected $table = 'for_valid_mains';

    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //Для работы прямой связи при ManyToOne
    public function forValids(): HasMany
    {
        return $this->hasMany(ForValid::class, 'for_valid_mains_id');
    }
}
