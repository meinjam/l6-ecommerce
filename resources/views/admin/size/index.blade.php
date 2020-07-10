@extends('layouts.admin.admin')
@section('open-size') menu-open @endsection
@section('active-size') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Sizes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Size</li>
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
                            <a href="{{ route('sizes.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus-circle"></i> Add New Size
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <form action="" method="get">
                                <div class="input-group mb-3 input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search color">
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
                                <th>Size Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th width="13%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                            <tr>
                                <td>{{ $size->id }}</td>
                                <td>{{ $size->name }}</td>
                                <td>{{ $size->created_by }} <small>({{ $size->created_at->format('M d, Y') }})</small> </td>
                                <td>
                                    @if ($size->updated_by)
                                        {{ $size->updated_by }} <small>({{ $size->updated_at->format('M d, Y') }})</small>
                                    @else
                                        ---------------
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('sizes.edit', $size->slug) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @if (count($size->products) == 0)
                                        <a href="{{ route('delete.size', $size->slug) }}"
                                            class="btn btn-danger btn-sm" id="delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success btn-sm"><span class="text-white px-1">{{ $size->products->count() }}</span></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <div class="float-right">
                        {{ $sizes->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
    
@endsection