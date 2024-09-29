<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Imagemm;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagemmPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Imagemm $imagemm): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Imagemm $imagemm): bool
    {
    }

    public function delete(ForCacheUser $user, Imagemm $imagemm): bool
    {
    }

    public function restore(ForCacheUser $user, Imagemm $imagemm): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Imagemm $imagemm): bool
    {
    }
}
