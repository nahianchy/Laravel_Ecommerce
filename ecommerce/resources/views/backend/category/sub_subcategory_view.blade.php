@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Sub=>Subcategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>SubCategory Name</th>

                                            <th>Sub->Subcategory English</th>
                                            <th>Sub->Subcategory Bn</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_subcategorys as $item)
                                            <tr>
                                                <td>{{ $item->categories->category_name_en }}</td>
                                                <td>{{ $item->subCategories->subcategory_name_en }}</td>
                                                <td>{{ $item->subsubcategory_name_en }}</td>
                                                <td>{{ $item->subsubcategory_name_bn }}</td>
                                                <td>
                                                    <a href="{{ route('subSubCategory.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="Edit Data"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('subSubCategory.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm " title="Delete Data" id="delete">
                                                        <i class="fa fa-trash"></i></a>
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

                {{-- Add subcategory --}}

                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub => Sub Category </h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <div class="table-responsive">
                                <form method='post' action="{{ route('subSubCategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="select" required class="form-control">
                                                <option selected="" disabled="">Select Your Category</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" id="select" required class="form-control">
                                                <option value="" selected="" disabled="">Select Your Sub Category</option>

                                            </select>
                                        </div>
                                    </div>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <h5>Sub->SubCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en"
                                                class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <h5>Sub->SubCategory Name Bangla<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_bn" id="subsubcategory_name_bn"
                                                class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    @error('subsubcategory_name_bn')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
