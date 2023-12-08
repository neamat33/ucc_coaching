@extends('admin.layouts.app')
@section('page-title','Product List')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Product List</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    </div>
                    <form action="{{ route('column.store') }}" method="POST">
                     @csrf
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label class="form-label">Shelf Name</label>
                            <select class="form-select" id="shelf_id" name="shelf_id" aria-label="Default select example">
                                <option selected="">Open this select shelf name</option>
                                @foreach ($shelf as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Row Name</label>
                            <select class="form-select" id="shelf_row_id" name="shelf_row_id" aria-label="Default select example">

                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label">Column Name</label>
                            <select class="form-select" id="column_id" name="shelf_column_id" aria-label="Default select example">
                            </select>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover align-middle mb-0" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Vendor Name</th>
                                            <th>Quantity</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody id="get_product">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $("#shelf_id").select2();
      $("#shelf_row_id").select2();
      $("#column_id").select2();
    });
    $(function(){
        $("#shelf_id").on("change", function() {
            let shelf_id = $(this).val();
            
            $.ajax({
                url: "{{ url('admin/get-row') }}",
                type: "GET",
                data: {
                    "shelf_id": shelf_id,
                },
                success: function(res) {
                    $("#shelf_row_id").html(res);
                }
            });

        });
        $("#shelf_row_id").on("change", function() {
            let row_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/get-column') }}",
                type: "GET",
                data: {
                    "row_id": row_id,
                },
                success: function(res) {
                    $("#column_id").html(res);
                }
            });
        });
        $("#column_id").on("change", function() {
            let column_id = $(this).val();
            $.ajax({
                url: "{{ url('admin/product-by-column') }}",
                type: "GET",
                data: {
                    "column_id": column_id,
                },
                success: function(res) {
                    if(res){
                        $("#get_product").html(res);
                    }else{
                        $("#get_product").html("<div>No data available!</div>");
                    }
                }
            });
        });

    });
</script>
@endsection
