<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Videomo extends Model
{
    use HasFactory;

    protected $table = 'videomos';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function commentmos(): MorphMany
    {
        return $this->morphMany(Commentmo::class, 'commentmoable');
    }
}
