<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PrimaryCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\testMail;
use App\Jobs\SendThanksMail;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('item');
            if (!is_null($id)) {
                $itemId = Product::availableItems()->where('products.id', $id)->exists();
                if (!$itemId) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }
    public function index(Request $request)
    {
        // Mail::to('test@example.com')
        //     ->send(new testMail);

        // SendThanksMail::dispatch();

        $categories = PrimaryCategory::with('secondary')->get();

        $products = Product::availableItems()
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort)
            ->paginate($request->pagination ?? '20');

        return view('user.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)->sum('quantity');
        $isLike = Like::where('product_id', $product->id)
            ->where('user_id', Auth::id())->exists();

        if ($quantity > 9) {
            $quantity = 9;
        }

        return view('user.show', compact('product', 'quantity', 'isLike'));
    }
}
