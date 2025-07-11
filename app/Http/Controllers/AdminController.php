<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalProducts = Product::count();
        $activeProducts = Product::active()->count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'activeProducts'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function updateUserPassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Password user berhasil diubah');
    }

    public function deleteUser(User $user)
    {
        if ($user->isAdmin()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus admin');
        }

        $user->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

    public function products()
    {
        $products = Product::paginate(10);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        return view('admin.create-product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function editProduct(Product $product)
    {
        return view('admin.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'stock']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
