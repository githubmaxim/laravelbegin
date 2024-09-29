<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Imagemm extends Model
{
    use HasFactory;

    protected $table = 'imagemms';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function commentmms(): MorphToMany
    {
        return $this->morphToMany(Commentmm::class, 'commentmmable');
    }
}
