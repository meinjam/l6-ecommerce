<?php

namespace App\Http\Controllers\Backend;

use App\Size;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function index() {
        
        $sizes = Size::latest()->paginate( 15 );
        return view( 'admin.size.index', compact( 'sizes' ) );
    }

    public function create() {
        
        return view( 'admin.size.create' );
    }

    public function store( Request $request ) {
        
        $request->validate( [
            'name' => 'required|unique:sizes',
        ] );

        $size = new Size();
        $size->name = $request->name;
        $size->slug = Str::slug( $size->name );
        $size->created_by = Auth::user()->name;
        $size->save();
        return redirect()->route( 'sizes.index' )->with( 'success', 'Size Added successfully.' );
    }

    public function edit( $slug ) {
        
        $size = Size::where( 'slug', $slug )->firstOrFail();
        return view( 'admin.size.edit', compact( 'size' ) );
    }

    public function update( Request $request, $slug ) {
        
        $request->validate( [
            'name' => 'required|unique:sizes',
        ] );

        $size = Size::where( 'slug', $slug )->firstOrFail();
        $size->name = $request->name;
        $size->slug = Str::slug( $request->name );
        $size->updated_by = Auth::user()->name;
        $size->save();
        return redirect()->route( 'sizes.index' )->with( 'success', 'Size Updated successfully.' );
    }

    public function destroy( $slug ) {
        
        Size::where( 'slug', $slug )->firstOrFail()->delete();
        return redirect()->back()->with( 'success', 'Size deleted successfully' );
    }
}
