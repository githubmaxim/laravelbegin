<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForValid extends Model
{
    use HasFactory;

    protected $table = 'for_valids';

    protected $fillable = [
        'title',
        'content',
        'status',
        'for_valid_mains_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //Для работы обратной связи при OneToMany
    public function forValidMain(): BelongsTo
    {
        return $this->belongsTo(ForValidMain::class, 'for_valid_mains_id');
    }
}
