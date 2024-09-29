<?php
declare(strict_types=1);

namespace App\Models\Polymorph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Commentmo extends Model
{
    use HasFactory;

    protected $table = 'commentmos';

    protected $fillable = [
        'body',
        'commentmoable_id',
        'commentmoable_type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function commentmoable(): MorphTo
    {
        return $this->morphTo();
    }
}
