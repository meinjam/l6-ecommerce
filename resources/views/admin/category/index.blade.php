@extends('layouts.admin.admin')
@section('open-category') menu-open @endsection
@section('active-category-all') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus-circle"></i> Add New Category
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <form action="" method="get">
                                <div class="input-group mb-3 input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search category">
                                    <div class="input-group-append">
                                      <button class="btn btn-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID.</th>
                                <th>Category Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th width="13%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_by }} <small>({{ $category->created_at->format('M d, Y') }})</small> </td>
                                <td>
                                    @if ($category->updated_by)
                                        {{ $category->updated_by }} <small>({{ $category->updated_at->format('M d, Y') }})</small>
                                    @else
                                        ---------------
                                    @endif
                                    {{-- {{ $category->updated_by ? $category->updated_by : '-----' }} --}}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->slug) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('delete.category', $category->slug) }}"
                                        class="btn btn-danger btn-sm" id="delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <div class="float-right">
                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection