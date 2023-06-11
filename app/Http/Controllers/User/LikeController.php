<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $likes = $user->likes;

        return view('user.like', compact('likes'));
    }

    public function add(Request $request)
    {
        $isLike = Like::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())->exists();

        if (!$isLike) {
            Like::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id
            ]);
        }

        return redirect()->route('user.items.show', ['item' => $request->product_id]);
    }

    public function delete(Request $request)
    {
        Like::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())->delete();

        return redirect()->route('user.items.show', ['item' => $request->product_id]);
    }
}
