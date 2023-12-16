@extends('admin.layouts.app')
@section('page-title', 'Assign Subject')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Assign Subject</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Assign Subject</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ url('admin/class-setup') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> List
                        Assign Subject</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/subject_assign/update') }}/{{ $single->class_id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Branch Name </b></label> <br>
                                <select name="branch_id" id="branch_id" class="form-select">
                                    <option value="{{ $single->branch_id }}" selected>{{ $single->branch_name }}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Class Name</b></label> <br>
                                <select name="class_id" id="class_id" class="form-select">
        
                                    <option  value="{{ $single->class_id }}" selected>{{ $single->class_name }}</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b> Subject Name </b></label> <br>
                                @foreach ($subjects as $subject)
                                    <input name="subject_id[]" type="checkbox" value="{{ $subject->id_subject }}"
                                        @if (in_array($subject->id_subject, explode(',', $single->subject_id))) checked @endif> &nbsp;
                                    {{ $subject->subject_name }} <br>
                                @endforeach

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>


@endsection
