@extends('admin.layouts.app')
@section('page-title','Expense List')

@section('content')
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h5 class="fw-bold mb-0">Expense List</h5>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Ref.No.</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense as $key=> $value)
                                <tr>
                                    <td><strong>{{ ++$key }}</strong></td>
                                    <td>{{ date('d-M-y',strtotime($value->date)) }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->category->name }}</td>
                                    <td>{{ $value->reference_no }}</td>
                                    <td>{{ $value->amount }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('expense.destroy',encrypt($value->id)) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-info" href="{{ route('expense.invoice',encrypt($value->id)) }}" target="_blank"><i class="fa fa-print"></i></a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('expense.edit',encrypt($value->id)) }}"><i class="fa fa-edit"></i></a>
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
</div>

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
