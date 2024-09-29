<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Videomo;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideomoPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Videomo $videomo): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Videomo $videomo): bool
    {
    }

    public function delete(ForCacheUser $user, Videomo $videomo): bool
    {
    }

    public function restore(ForCacheUser $user, Videomo $videomo): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Videomo $videomo): bool
    {
    }
}
