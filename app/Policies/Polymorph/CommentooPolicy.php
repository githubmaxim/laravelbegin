<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Commentoo;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentooPolicy
{
    use HandlesAuthorization;

//    public function viewAny(ForCacheUser $user): bool
//    {
//
//    }
//
//    public function view(ForCacheUser $user, Commentoo $commentoo): bool
//    {
//    }
//
//    public function create(ForCacheUser $user): bool
//    {
//    }
//
//    public function update(ForCacheUser $user, Commentoo $commentoo): bool
//    {
//    }
//
//    public function delete(ForCacheUser $user, Commentoo $commentoo): bool
//    {
//    }
//
//    public function restore(ForCacheUser $user, Commentoo $commentoo): bool
//    {
//    }
//
//    public function forceDelete(ForCacheUser $user, Commentoo $commentoo): bool
//    {
//    }
}
