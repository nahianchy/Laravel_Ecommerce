@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>category icon</th>
                                            <th>category En</th>
                                            <th>category Bn</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categorys as $item)
                                            <tr>
                                                <td>
                                                    <span><i class="{{ $item->category_icon }}"></i></span>
                                                </td>
                                                <td>{{ $item->category_name_en }}</td>
                                                <td>{{ $item->category_name_bn }}</td>

                                             
                                                <td>
                                                    {{-- <a href="{{ route('category.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <a href="{{ route('category.delete', $item->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm">Delete</a> --}}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                {{-- Add Category --}}

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category </h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="table-responsive">
                                {{-- <form method='post' action="{{ route('category.store') }}"> --}}
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="Category_name_en" name="category_name_en"
                                                class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @error('Category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <h5>Category Name Bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_bn" id="category_name_bn"
                                                class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @error('Category_name_ebn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <h5>Category  Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" id="category_icon" class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @error('Category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add New">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
