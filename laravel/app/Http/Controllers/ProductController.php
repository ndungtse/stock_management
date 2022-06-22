<?php
    
    namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.view', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('products.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'p_name' => 'required',
            'p_type' => 'required',
            'p_qoh' => 'required',
            'price' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('products.view')
                        ->with('success','Product created successfully.');
    }
}
?>