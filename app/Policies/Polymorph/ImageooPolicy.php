<?php
declare(strict_types=1);

namespace App\Policies\Polymorph;

use App\Models\ForCacheUser;
use App\Models\Polymorph\Imageoo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageooPolicy
{
    use HandlesAuthorization;

//    public function viewAny(ForCacheUser $user): bool
//    {
//
//    }
//
//    public function view(ForCacheUser $user, Imageoo $imageoo): bool
//    {
//    }
//
//    public function create(ForCacheUser $user): bool
//    {
//    }
//
//    public function update(ForCacheUser $user, Imageoo $imageoo): bool
//    {
//    }
//
//    public function delete(ForCacheUser $user, Imageoo $imageoo): bool
//    {
//    }
//
//    public function restore(ForCacheUser $user, Imageoo $imageoo): bool
//    {
//    }
//
//    public function forceDelete(ForCacheUser $user, Imageoo $imageoo): bool
//    {
//    }
}
