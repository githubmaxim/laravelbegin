<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Commentmm;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentmmPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Commentmm $commentmm): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Commentmm $commentmm): bool
    {
    }

    public function delete(ForCacheUser $user, Commentmm $commentmm): bool
    {
    }

    public function restore(ForCacheUser $user, Commentmm $commentmm): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Commentmm $commentmm): bool
    {
    }
}
