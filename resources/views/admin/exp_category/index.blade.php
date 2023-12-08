@extends('admin.layouts.app')
@section('page-title','Expense Category List')

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Expense Category @isset($add) Add @endisset  @isset($edit) Edit @endisset</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix g-3">
            <div class="col-lg-4">
                @isset($add)
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Category Name</h6>
                    </div>
                    <form action="{{ route('expense_category.store') }}" method="POST">
                     @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5">Submit</button>
                    </div>
                    </form>
                </div>
                @endisset
                @isset($edit)
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Category Name</h6>
                    </div>
                    <form action="{{ route('expense_category.update',encrypt($single->id)) }}" method="POST">
                     @csrf
                     @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ $single->name }}" class="form-control" required="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 text-uppercase px-5">Update</button>
                    </div>
                    </form>
                </div>
                @endisset
            </div>
            <div class="col-lg-8">
                <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="myDataTable" class="table table-bordered table-striped table-hover align-middle mb-0" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>S.R.NO.</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expense_category as $key=>$value)
                                        <tr>
                                            <td><strong>{{ ++$key }}</strong></td>
                                            <td><span> {{ $value->name }}</span></td>
                                            <td class="text-center">

                                                <form action="{{ route('expense_category.destroy',encrypt($value->id)) }}" method="Post">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('expense_category.edit',encrypt($value->id)) }}"><i class="fa fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash text-primary"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
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


<!-- Jquery Page Js -->
<script src="{{ asset('admin') }}/js/template.js"></script>
<script>
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
