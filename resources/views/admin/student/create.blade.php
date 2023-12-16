@extends('admin.layouts.app')
@section('page-title', 'Student Admission')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Student Admission</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Student Admission</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{ url('admin/class-setup') }}"
                        class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Student List</a></h6>
            </div>
            <div class="card-body">

                <form action="{{ route('students.store') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Student Name </b><span class="text-danger">*</span></label>
                                <input name="student_name" id="student_name" {{ old('student_name') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('student_name'))
                                    <span class="invalid-feedback">{{ $errors->first('student_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Mobile </b><span class="text-danger">*</span></label>
                                <input type="number" name="mobile" id="mobile" {{ old('mobile') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for=""><b>Email </b></label>
                                <input type="email" name="email" id="email" {{ old('email') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Date Of Birth </b><span class="text-danger">*</span></label>
                                <input type="date" name="dob" id="dob" {{ old('dob') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Image </b></label>
                                <input type="file" name="img" id="img" {{ old('img') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback">{{ $errors->first('img') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Name </b></label>
                                <input name="father_name" id="mobile" {{ old('father_name') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('father_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Name </b></label>
                                <input name="mother_name" id="mother_name" {{ old('mother_name') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Mobile </b></label>
                                <input type="number" name="father_mobile" id="father_mobile" {{ old('father_mobile') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('father_mobile'))
                                    <span class="invalid-feedback">{{ $errors->first('father_mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Mobile </b></label>
                                <input type="number" name="mother_mobile" id="mother_mobile" {{ old('mother_mobile') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_mobile') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Father Email </b></label>
                                <input type="email" name="father_email" id="father_email" {{ old('father_email') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('father_email'))
                                    <span class="invalid-feedback">{{ $errors->first('father_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Mother Email </b></label>
                                <input type="email" name="mother_email" id="mother_email" {{ old('mother_email') }}
                                    class="form-control mt-1" />
                                @if ($errors->has('mother_email'))
                                    <span class="invalid-feedback">{{ $errors->first('mother_email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Present Address </b></label>
                                <textarea name="present_address" class="form-control mt-1" rows="1">{{ old('present_address') }}</textarea>
                                @if ($errors->has('present_address'))
                                    <span class="invalid-feedback">{{ $errors->first('present_address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4 mt-1">
                                <label for=""><b>Permanent Address </b></label>
                                <textarea name="permanent_address" class="form-control mt-1" rows="1">{{ old('permanent_address') }}</textarea>
                                @if ($errors->has('permanent_address'))
                                    <span class="invalid-feedback">{{ $errors->first('permanent_address') }}</span>
                                @endif
                            </div>
                            <div class=" mt-4 mb-3">
                                <h6 class="m-0 font-weight-bold text-primary">Assign Class</h6>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Branch Name </b></label>
                                <select name="branch_id" id="branch_id" class="form-select mt-1">

                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id_branch }}">{{ $branch->branch_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Class Name </b></label>
                                <select name="class_id" id="class_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id_class }}">{{ $class->class_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Section Name </b></label> <br>
                                <select name="section_id" id="section_id" class="form-select mt-1">
                                    <option value="">--Select--</option>
                                    

                                </select>
                            </div>

                            <div class="form-group col-md-3 mt-1">
                                <label for=""><b>Shift Name </b></label> <br>
                                <select name="shift_id" id="shift_id" class="form-select mt-1">
                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->id_shift }}">{{ $shift->shift_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="text-align:right">
                                <div class="mt-3">
                                    <p id="select-alert" class="text-danger p-2"></p>
                                    <button type="submit" class="btn btn-primary ">Save Information</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        $(function() {

            $(document).on('change', '#class_id', function() {
                let class_id = $(this).val();
                let branch_id = $("#branch_id").val();
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/get_section') }}",
                    data: {
                        'class_id': class_id, 'branch_id':branch_id
                    },
                    success: function(data) {
                        //console.log(data)
                        $("#section_id").html(data);
                    },
                });
            });
        })
    </script>
@endsection
