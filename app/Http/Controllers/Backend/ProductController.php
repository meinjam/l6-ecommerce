<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductSubImage;
use App\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller {

    public function __construct() {

        $this->middleware( 'auth' );
    }

    public function index() {

        $products = Product::with( ['colors', 'sizes'] )->latest()->paginate( 15 );
        return view( 'admin.product.index', compact( 'products' ) );
    }

    public function create() {

        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view( 'admin.product.create', compact( 'categories', 'brands', 'sizes', 'colors' ) );
    }

    public function store( Request $request ) {

        $request->validate( [
            'name'        => 'required|unique:products|min:3',
            'price'       => 'required|regex:/^[\d.]{1,10}$/',
            'category_id' => 'required',
            'brand_id'    => 'required',
            'color_id'    => 'required',
            'size_id'     => 'required',
            'short_desc'  => 'required|min:8',
            'long_desc'   => 'required|min:8',
            'image'       => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            // 'sub_image'   => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ] );

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug( $request->name );
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;

        $image = $request->file( 'image' );
        $imageName = Str::slug( $request->name ) . '-main-image-' . time();
        $extension = strtolower( $image->getClientOriginalExtension() );
        $imageFullName = $imageName . '.' . $extension;
        $uploadPath = 'img/product-img/';
        $imageURL = $uploadPath . $imageFullName;
        $image->move( $uploadPath, $imageFullName );
        $product['image'] = $imageURL;

        // $inserted = $product->save();

        if ( $product->save() ) {

            $product->colors()->attach( $request->color_id );
            $product->sizes()->attach( $request->size_id );

            $sub_images = $request->file( 'sub_image' );
            if ( !empty( $sub_images ) ) {

                $count = 1;
                foreach ( $sub_images as $image ) {

                    $imageName = $product->slug . '-sub-image-' . time() . $count;
                    $extension = strtolower( $image->getClientOriginalExtension() );
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadPath = 'img/product-img/';
                    $imageURL = $uploadPath . $imageFullName;
                    $image->move( $uploadPath, $imageFullName );
                    $product_sub_img = new ProductSubImage();
                    $product_sub_img->product_id = $product->id;
                    $product_sub_img->image = $imageURL;
                    $product_sub_img->save();
                    $count++;
                }
            }

            return redirect()->route( 'products.index' )->with( 'success', 'Product Added successfully.' );

        } else {

            return redirect()->route( 'products.index' )->with( 'error', 'Something Went wrong, Please try again later.' );
        }

    }

    public function show( $slug ) {

        $product = Product::with( ['category', 'brand', 'colors', 'sizes', 'sub_images'] )->where( 'slug', $slug )->firstOrFail();
        // return response()->json($product);
        return view( 'admin.product.show', compact( 'product' ) );
    }

    public function edit( $slug ) {

        $product = Product::with( ['colors', 'sizes', 'sub_images'] )->where( 'slug', $slug )->firstOrFail();
        $categories = Category::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view( 'admin.product.edit', compact( 'product', 'categories', 'brands', 'sizes', 'colors' ) );
    }

    public function update( Request $request, $slug ) {

        $request->validate( [
            'name'        => 'sometimes|required|unique:products|min:3',
            'price'       => 'required|regex:/^[\d.]{1,10}$/',
            'category_id' => 'required',
            'brand_id'    => 'required',
            'color_id'    => 'required',
            'size_id'     => 'required',
            'short_desc'  => 'required|min:8',
            'long_desc'   => 'required|min:8',
            'image'       => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            // 'sub_image'   => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ] );

        
        $product = Product::where( 'slug', $slug )->firstOrFail();
        $product->name = $request->name;
        $product->slug = Str::slug( $request->name );
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $image = $request->file( 'image' );
        $old_main_img = $product->image;

        if ( !empty( $image ) ) {

            $imageName = Str::slug( $request->name ) . '-main-image-' . time();
            $extension = strtolower( $image->getClientOriginalExtension() );
            $imageFullName = $imageName . '.' . $extension;
            $uploadPath = 'img/product-img/';
            $imageURL = $uploadPath . $imageFullName;
            $image->move( $uploadPath, $imageFullName );
            $product['image'] = $imageURL;

            $product->save();
            $product->colors()->sync( $request->color_id );
            $product->sizes()->sync( $request->size_id );
            unlink( $old_main_img );

            $sub_images = $request->file( 'sub_image' );
            if ( !empty( $sub_images ) ) {

                $old_sub_images = ProductSubImage::where( 'product_id', $product->id )->get();
                foreach ( $old_sub_images as $old_sub_image ) {
                    unlink( $old_sub_image->image );
                }
                ProductSubImage::where( 'product_id', $product->id )->delete();

                $count = 1;
                foreach ( $sub_images as $image ) {

                    $imageName = $product->slug . '-sub-image-' . time() . $count;
                    $extension = strtolower( $image->getClientOriginalExtension() );
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadPath = 'img/product-img/';
                    $imageURL = $uploadPath . $imageFullName;
                    $image->move( $uploadPath, $imageFullName );
                    $product_sub_img = new ProductSubImage();
                    $product_sub_img->product_id = $product->id;
                    $product_sub_img->image = $imageURL;
                    $product_sub_img->save();
                    $count++;
                }
            }

            return redirect()->route( 'products.index' )->with( 'success', 'Product Updated successfully.' );

        } else {

            $product->save();
            $product->colors()->sync( $request->color_id );
            $product->sizes()->sync( $request->size_id );

            $sub_images = $request->file( 'sub_image' );
            if ( !empty( $sub_images ) ) {

                $old_sub_images = ProductSubImage::where( 'product_id', $product->id )->get();
                foreach ( $old_sub_images as $old_sub_image ) {
                    unlink( $old_sub_image->image );
                }
                ProductSubImage::where( 'product_id', $product->id )->delete();

                $count = 1;
                foreach ( $sub_images as $image ) {

                    $imageName = $product->slug . '-sub-image-' . time() . $count;
                    $extension = strtolower( $image->getClientOriginalExtension() );
                    $imageFullName = $imageName . '.' . $extension;
                    $uploadPath = 'img/product-img/';
                    $imageURL = $uploadPath . $imageFullName;
                    $image->move( $uploadPath, $imageFullName );
                    $product_sub_img = new ProductSubImage();
                    $product_sub_img->product_id = $product->id;
                    $product_sub_img->image = $imageURL;
                    $product_sub_img->save();
                    $count++;
                }
            }

            return redirect()->route( 'products.index' )->with( 'success', 'Product Updated successfully.' );
        }
    }

    public function destroy( $slug ) {

        $product = Product::where( 'slug', $slug )->firstOrFail();
        $main_img = $product->image;
        $sub_images = ProductSubImage::where( 'product_id', $product->id )->get();

        $delete = $product->delete();
        if ( $delete ) {
            $product->colors()->detach();
            $product->sizes()->detach();
            unlink( $main_img );
            foreach ( $sub_images as $sub_img ) {
                unlink( $sub_img->image );
            }
            ProductSubImage::where( 'product_id', $product->id )->delete();
            return redirect()->route( 'products.index' )->with( 'success', 'Product Deleted successfully.' );
        }
    }
}
