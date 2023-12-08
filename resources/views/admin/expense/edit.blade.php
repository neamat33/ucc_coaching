@extends('admin.layouts.app')
@section('page-title','Expense List')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Expense Edit</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <form action="{{ route('expense.update',encrypt($single->id)) }}" method="post">
        @csrf
        @method('put')
        <div class="row clearfix g-3">


            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">expense Information</h6>
                    </div>
                    <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <input type="hidden" name="log_id" class="form-control" required="" value="{{ $single->log_id }}">
                                    <label class="form-label">Category</label><label class="text-danger"> *</label>
                                    <select class="form-select" id="category_id" name="category_id" aria-label="Default select example" required>
                                        <option selected="">Open this select category name</option>
                                        @foreach ($category as $value)
                                            <option @if($single->category_id == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Expense title</label><label class="text-danger"> *</label>
                                    <input type="text" name="title" class="form-control" required="" value="{{ old('title',$single->title) }}">
                                    <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Amount</label><label class="text-danger"> *</label>
                                    <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount',$single->amount) }}" required="">
                                    <span class="text-danger">{{ $errors->has('amount') ? $errors->first('amount') : '' }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Reference No.</label>
                                    <input type="text" id="reference_no" name="reference_no" class="form-control" value="{{ old('reference_no',$single->reference_no) }}">
                                    <span class="text-danger">{{ $errors->has('reference_no') ? $errors->first('reference_no') : '' }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Expense Date</label>
                                    <input type="date" name="date" class="form-control pull-right datepicker" value="{{ $single->date }}" required="">
                                    <span class="text-danger">{{ $errors->has('date') ? $errors->first('date') : '' }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Note</label>
                                    <textarea class="form-control" name="note">{{ $single->note }}</textarea>
                                    <span class="text-danger">{{ $errors->has('note') ? $errors->first('note') : '' }}</span>
                                </div>
                            </div>
                            <button type="submit" id="prs-submit" class="btn btn-primary mt-4 text-uppercase px-5">Submit</button>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        </form>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Jquery Page Js -->
<script>
    $(document).ready(function() {
      $("#category_id").select2();
    });
    $(function(){

        $("#barcode").on("keyup", function() {
            let barcode = $(this).val();
            $.ajax({
                url: "{{ url('admin/check-space-list') }}",
                type: "GET",
                data: {
                    "barcode": barcode,
                },
                success: function(res) {
                    $("#shelf-info").html(res);
                }
            });
        });
    });
</script>
<script src="{{ asset('admin') }}/js/template.js"></script>
<script>
    $(function(){
        $("#product_id").select2();
    });
    $('#myDataTable')
    .addClass( 'nowrap' )
    .dataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
</script>
@endsection
