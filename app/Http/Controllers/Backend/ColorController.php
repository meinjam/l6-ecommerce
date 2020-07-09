<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ColorController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function index() {
        
        $colors = Color::latest()->paginate( 15 );
        return view( 'admin.color.index', compact( 'colors' ) );
    }

    public function create() {
        
        return view( 'admin.color.create' );
    }

    public function store( Request $request ) {
        
        $request->validate( [
            'name' => 'required|unique:colors|min:3',
        ] );

        $color = new Color();
        $color->name = $request->name;
        $color->slug = Str::slug( $color->name );
        $color->created_by = Auth::user()->name;
        $color->save();
        return redirect()->route( 'colors.index' )->with( 'success', 'Color Added successfully.' );
    }

    public function edit( $slug ) {
        
        $color = Color::where( 'slug', $slug )->firstOrFail();
        return view( 'admin.color.edit', compact( 'color' ) );
    }

    public function update( Request $request, $slug ) {
        
        $request->validate( [
            'name' => 'required|unique:colors|min:3',
        ] );

        $color = Color::where( 'slug', $slug )->firstOrFail();
        $color->name = $request->name;
        $color->slug = Str::slug( $request->name );
        $color->updated_by = Auth::user()->name;
        $color->save();
        return redirect()->route( 'colors.index' )->with( 'success', 'Color Updated successfully.' );
    }

    public function destroy( $slug ) {
        
        Color::where( 'slug', $slug )->firstOrFail()->delete();
        return redirect()->back()->with( 'success', 'Color deleted successfully' );
    }
}
