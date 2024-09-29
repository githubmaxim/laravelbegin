<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Commentmo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentmoPolicy
{
    use HandlesAuthorization;

    public function viewAny(ForCacheUser $user): bool
    {

    }

    public function view(ForCacheUser $user, Commentmo $commentmo): bool
    {
    }

    public function create(ForCacheUser $user): bool
    {
    }

    public function update(ForCacheUser $user, Commentmo $commentmo): bool
    {
    }

    public function delete(ForCacheUser $user, Commentmo $commentmo): bool
    {
    }

    public function restore(ForCacheUser $user, Commentmo $commentmo): bool
    {
    }

    public function forceDelete(ForCacheUser $user, Commentmo $commentmo): bool
    {
    }
}
