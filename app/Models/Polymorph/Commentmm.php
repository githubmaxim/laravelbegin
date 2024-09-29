<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Commentmm extends Model
{
    use HasFactory;

    protected $table = 'commentmms';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function videomms(): MorphToMany
    {
        return $this->morphedByMany(Videomm::class, 'commentmmable');
    }

    public function images(): MorphToMany
    {
        return $this->morphedByMany(Imagemm::class, 'commentmmable');
    }
}
