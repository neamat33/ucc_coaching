@extends('admin.layouts.app')
@section('page-title','Expense Report')
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h4 class="fw-bold mb-0">Transaction Report</h4>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <form action="{{ route('report.profit_loss_report') }}" method="POST" target="_blank">
                     @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group mb-2 col-4">
                                <label class="form-label">From</label>
                                <input type="date" name="from" class="form-control" value="@php echo date("Y-m-d") @endphp" >
                            </div>
                            <div class="form-group mb-2 col-4">
                                <label class="form-label">To</label>
                                <input type="date" name="to" id="to" class="form-control" value="@php echo date("Y-m-d") @endphp">
                            </div>
                            <div class="form-group mb-2 col-4">
                                <div class="mt-4 pt-1">
                                    <input type="submit" class="btn btn-primary form-control" value="Search">
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $("#category_id").select2();
    });
</script>
@endsection
