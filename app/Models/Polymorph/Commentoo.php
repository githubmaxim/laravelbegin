<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Commentoo extends Model
{
    use HasFactory;

    protected $table = 'commentoos';

    protected $fillable = [
        'body',
        'commentooable_id',
        'commentooable_type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function commentooable():MorphTo
    {
        return $this->morphTo();
    }
}
