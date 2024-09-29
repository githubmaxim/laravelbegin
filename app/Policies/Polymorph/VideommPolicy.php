<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Videomm;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideommPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Videomm $videomm): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Videomm $videomm): bool
    {
    }

    public function delete(ForCacheUser $user, Videomm $videomm): bool
    {
    }

    public function restore(ForCacheUser $user, Videomm $videomm): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Videomm $videomm): bool
    {
    }
}
