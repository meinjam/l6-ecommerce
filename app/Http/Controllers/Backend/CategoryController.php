<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function index() {

        $categories = Category::latest()->paginate( 15 );
        return view( 'admin.category.index', compact( 'categories' ) );
    }

    public function create() {

        return view( 'admin.category.create' );
    }

    public function store( Request $request ) {

        $request->validate( [
            'name' => 'required|unique:categories|min:3',
        ] );

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug( $category->name );
        $category->created_by = Auth::user()->name;
        $category->save();
        return redirect()->route( 'categories.index' )->with( 'success', 'Category Added successfully.' );
    }

    public function edit( $slug ) {

        $category = Category::where( 'slug', $slug )->firstOrFail();
        return view( 'admin.category.edit', compact( 'category' ) );
    }

    public function update( Request $request, $slug ) {

        $request->validate( [
            'name' => 'required|unique:categories|min:3',
        ] );

        $category = Category::where( 'slug', $slug )->firstOrFail();
        $category->name = $request->name;
        $category->slug = Str::slug( $request->name );
        $category->updated_by = Auth::user()->name;
        $category->save();
        return redirect()->route( 'categories.index' )->with( 'success', 'Category Updated successfully.' );
    }

    public function destroy( $slug ) {

        Category::where( 'slug', $slug )->firstOrFail()->delete();
        return redirect()->back()->with( 'success', 'Category deleted successfully' );
    }
}
