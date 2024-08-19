<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForMail extends Model
{
    use HasFactory;

    protected $table = 'for_mails';

    protected $fillable = [
        'email',
        'name',
        'content',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
