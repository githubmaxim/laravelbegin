<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ForCacheAutent extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'for_cache_users';

    protected $fillable = [
        'email',
        'password',
        'remember_token',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    //Метод для хэширования поля "password". Если нужно хэшировать поле с другим именем, то в название
    // метода вместо "--Password--" нужно вставить название необходимого поля.
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
