<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function index() {

        $brands = Brand::latest()->paginate( 15 );
        return view( 'admin.brand.index', compact( 'brands' ) );
    }

    public function create() {

        return view( 'admin.brand.create' );
    }

    public function store( Request $request ) {

        $request->validate( [
            'name' => 'required|unique:brands|min:3',
        ] );

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug( $brand->name );
        $brand->created_by = Auth::user()->name;
        $brand->save();
        return redirect()->route( 'brands.index' )->with( 'success', 'Brand Added successfully.' );
    }

    public function edit( $slug ) {
        
        $brand = Brand::where( 'slug', $slug )->firstOrFail();
        return view( 'admin.brand.edit', compact( 'brand' ) );
    }

    public function update( Request $request, $slug ) {
        
        $request->validate( [
            'name' => 'required|unique:brands|min:3',
        ] );

        $brand = Brand::where( 'slug', $slug )->firstOrFail();
        $brand->name = $request->name;
        $brand->slug = Str::slug( $request->name );
        $brand->updated_by = Auth::user()->name;
        $brand->save();
        return redirect()->route( 'brands.index' )->with( 'success', 'Brand Updated successfully.' );
    }

    public function destroy( $slug ) {
        
        Brand::where( 'slug', $slug )->firstOrFail()->delete();
        return redirect()->back()->with( 'success', 'Brand deleted successfully' );
    }
}
