<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Imagemo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagemoPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Imagemo $imagemo): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Imagemo $imagemo): bool
    {
    }

    public function delete(ForCacheUser $user, Imagemo $imagemo): bool
    {
    }

    public function restore(ForCacheUser $user, Imagemo $imagemo): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Imagemo $imagemo): bool
    {
    }
}
