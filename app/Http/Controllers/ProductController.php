<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Mockery\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('list of products');
        $product = Product::all();

        $isList = true;
        return view('product.products', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view()->make('product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        );
        $validator = Validator()->make(request()->all(), $rules);

        // process
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(request()->all());
        } else {
            // store
            $newProduct = new Product;
            $newProduct->name = request()->get('name');
            $newProduct->description = request()->get('description');
            $newProduct->price = request()->get('price');
            $newProduct->save();

            // redirect
            session()->flash('message', 'Successfully added new product!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the product
        $product = Product::find($id);

        // show the edit form and pass the product
        return view('product.products', compact('product'))->with('singular',true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the product
        $product = Product::find($id);

        // show the edit form and pass the product
        return view('product.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'description'=> 'required',
            'price' => 'required|numeric',
        );
        $validator = validator()->make(request()->all(), $rules);

        // process the product
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(request()->all());
        } else {
            // update
            $product = Product::find($id);
            $product->name = request()->get('name');
            $product->description = request()->get('description');
            $product->name = request()->get('price');
            $product->save();

            // redirect
            session()->flash('message', 'Successfully updated product!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $product = Product::find($id);
        $product->delete();

        // redirect
        session()->flash('message', 'Successfully deleted product');
        return redirect()->back();
    }
}
