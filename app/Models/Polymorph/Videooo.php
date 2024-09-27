<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Videooo extends Model
{
    use HasFactory;

    protected $table = 'videooos';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function commentoos(): MorphOne
    {
        return $this->morphOne(Commentoo::class, 'commentooable');
    }
}
