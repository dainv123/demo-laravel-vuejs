<?php
namespace App\Policies;
use App\Models\User;
use App\Models\ProductSize;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductSizePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\ProductSize  $post
     * @return mixed
     */
    public function view()
    {
        return true;
    }
}