<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function creatFollow(User $user)
    {
        // Don't follow yourself
        if ($user->id === auth()->user()->id) {
            return back()->with('failure', 'You can not follow yourself');
        }
        // don't follow the user which you are already following

        $alreadyExist = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        if ($alreadyExist) {
            return back()->with('failure', 'This user is already followed');
        }
        $newFollow = new Follow();
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();
        return back()->with('success', 'Followed user successfully');
    }

    public function removeFollow() {}
}
