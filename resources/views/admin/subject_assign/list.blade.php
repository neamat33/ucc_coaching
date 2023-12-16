@extends('admin.layouts.app')
@section('page-title', 'Assign Subject')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> Assign Subject</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Assign Subject List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Assign Subject</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Branch Name</th>
                            <th>Class Name</th>
                            <th>Subject Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($subject_assign as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->branch_name }}</td>
                            <td>{{ $item->class_name }}</td>
                            <td>{{ $item->subject_name }}</td>
                            
                            <td>
                                        
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success set-status" id="status_{{ $item->class_id}}"
                                        onclick="setActive({{ $item->class_id}})">Active</span>
                                @else
                                    <span class="badge bg-danger set-status" id="status_{{ $item->class_id}}"
                                        onclick="setActive({{ $item->class_id}})">Inactive</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{ url('admin/subject_assign_edit')}}/{{ $item->id_branch }}/{{$item->class_id}}" 
                                    class="btn btn-primary btn-circle btn-sm editBtn">
                                    <i class="fa fa-edit text-white"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal fade  mb-5" id="AddModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Class Setup</h5>
                    </div>
                    <form action="{{ route('subject_assign.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for=""><b>Branch Name </b></label><br>

                                <select name="branch_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($branch as $value)
                                        <option value="{{$value->id_branch}}">{{ $value->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Class Name</b></label><br>
                                <select name="class_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id_class}}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""><b> Subject Name </b></label> <br>
                                @foreach($subjects as $subject)
                                    <input name="subject_id[]" type="checkbox" value="{{ $subject->id_subject}}"> &nbsp; {{ $subject->subject_name }} <br>
                                @endforeach
                                
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal to edit record -->
    <div class="modal fade  mb-5" id="EditModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Occupation</h5>
                    </div>
                    <form id="update-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="shift_name" name="shift_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Shift Start</label>
                                <input type="time" class="form-control" id="shift_start" name="shift_start" required>
                            </div>
                            <div class="form-group">
                                <label for="">Shift End</label>
                                <input type="time" class="form-control" id="shift_end" name="shift_end" required>
                            </div>
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <select id="branch_id" name="branch_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($branch as $value)
                                        <option value="{{$value->id_branch}}">{{ $value->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(function(){
                
                 $(document).on('click', '.editBtn', function() {
                let id = $(this).data("id");
                $.ajax({
                    type: 'GET',
                    url: "{{ url('admin/shift_edit') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#shift_name').val(data.shift_name);
                        $('#shift_start').val(data.shift_start);
                        $('#shift_end').val(data.shift_end);
                        $('#branch_id').val(data.branch_id);
                        var id = data.id_assign; 
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "{{ url('admin/shift/update') }}/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });
            })
            
        </script>

@endsection
