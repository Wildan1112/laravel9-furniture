<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $product = Product::query();

            return DataTables::of($product)
                ->addColumn('action', function($item) {
                    return '
                        <a href="'. route('dashboard.product.gallery.index', $item->id) .'" class="bg-blue-500 hover:bg-blue-700 text-white rounded-md font-bold px-2 py-1 m-2 text-sm">
                            Gallery
                        </a>
                        <a href="'. route('dashboard.product.edit', $item->id) .'" class="bg-yellow-500 hover:bg-yellow-700 text-white rounded-md font-bold px-2 py-1 m-2 text-sm">
                            Edit
                        </a>
                        <form class="inline-block" action="'. route('dashboard.product.destroy', $item->id) .'" method="post">
                            <button class="bg-red-500 hover:bg-red-700 text-white rounded-md font-bold px-2 py-1 m-2 text-sm">
                                Hapus
                            </button>
                            '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })
                ->editColumn('price', function($item) {
                    return number_format($item->price, 0, '', '.');
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.dashboard.product.edit', [
            'item' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
