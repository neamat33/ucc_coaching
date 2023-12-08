@extends('admin.layouts.app')
@section('page-title', 'Section List')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light">Academic /</span> section</h4>

        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Section List</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="" data-bs-toggle="modal"
                        data-bs-target="#AddModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add
                        Section</a></h6>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Section Name</th>
                            <th>Branch Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($section as $key=>$item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->section_name}}</td>
                            <td>{{ $item->branch_name}}</td>
                            <td>
                                        
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success set-status" id="status_{{ $item->id_section}}"
                                        onclick="setActive({{ $item->id_section}})">Active</span>
                                @else
                                    <span class="badge bg-danger set-status" id="status_{{ $item->id_section}}"
                                        onclick="setActive({{ $item->id_section}})">Inactive</span>
                                @endif

                            </td>
                            <td><a data-id="{{ $item->id_section}}" data-bs-toggle="modal" data-bs-target="#EditModal"
                                class="btn btn-primary btn-circle btn-sm editBtn">
                                <i class="fa fa-edit text-white"></i>
                            </a></td>
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
                        <h5 class="modal-title">Add Section</h5>
                    </div>
                    <form action="{{ route('section.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="section_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <select name="branch_id" class="form-select">
                                    <option value="">Select</option>
                                    @foreach($branch as $value)
                                        <option value="{{$value->id_branch}}">{{ $value->branch_name }}</option>
                                    @endforeach
                                </select>
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
                                <input type="text" class="form-control" id="section_name" name="section_name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Branch Name</label>
                                <select name="branch_id" id="branch_id" class="form-select">
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
                    url: "{{ url('admin/section_edit') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#section_name').val(data.section_name);
                        $('#branch_id').val(data.branch_id);
                        var id = data.id_section; 
                        // Replace this with actual dynamic ID value
                        var formActionUrl = "{{ url('admin/section/update') }}/" + id;
                        $('#update-form').attr('action', formActionUrl);
                    },
                });
            });
            })
            
        </script>

@endsection
