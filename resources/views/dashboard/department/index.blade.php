@extends('dashboard.index')
@section('style')
<link href="{{asset('dashboard_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5">Depatment And Designation</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item">Employee</li> --}}
            <li class="breadcrumb-item " ><a class="text-primary"> Departments</a></li>
        </ol>
    </div>

</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Deparments</h4>
                <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Department</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-dark">#</th>
                                <th class="text-dark">Department Name</th>
                                <th class="text-dark">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $data )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->department}}</td>
                                    <td>
                                        <span>
                                            <a  href="javascript:void()" class="mr-4 edit"  data-toggle="modal" data-target="#editModal" data-placement="top" data-value="{{$data->id}}" title="Edit"><i class="fa fa-pencil  text-primary "></i></a>


                                        <a href="javascript:void()" data-value="{{$data->id}}" data-toggle="modal" data-target="#deleteModal" data-placement="top" title="Delete" class="delt">
                                       <i class="fa fa-close text-danger "></i>
                                            </a></span>
                                    </td>
                                    {{-- <td><span><a href="javascript:void()" class="mr-4"  title="Edit"><i
                                            class="fa fa-pencil btn btn-primary btn-sm text-white"></i> </a><a
                                        href="javascript:void()"
                                       title="Delete"><i
                                            class="fa fa-close btn btn-danger btn-sm text-white"></i></a></span>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Designations</h4>
                <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal2" style="font-size: 11px !important;">Add Designation</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Designation </th>
                                <th>Department</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $data )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->department->department}}</td>
                                    <td> {{$data->designation}} </td>
                                    <td>
                                        <span>
                                            <a  href="javascript:void()" class="mr-4 editDesig"  data-toggle="modal" data-target="#editDesigModal" data-placement="top" data-value="{{$data->id}}" title="Edit"><i class="fa fa-pencil  text-primary "></i></a>


                                        <a href="javascript:void()" data-value="{{$data->id}}" data-toggle="modal" data-target="#deleteDesigModal" data-placement="top" title="Delete" class="deltDesg">
                                       <i class="fa fa-close text-danger "></i>
                                            </a></span>
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
{{-- department modal --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('department.store')}}" method="POST">
                    @csrf
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Department :</label>
                        <input type="text" name="department" class="form-control" placeholder="Department Name">
                    </div>
                    <div class="modal-footer">
                        <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- edit department modal --}}
<div class="modal fade" id="editModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="departmentForm" action="{{route('department.update',0)}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Department :</label>
                        <input type="text" name="department" id="department" class="form-control" placeholder="Department Name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  btn-outline-primary float-right" style="font-size: 11px;">Update </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- designation modal --}}
<div class="modal fade" id="createModal2">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('designation.store')}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="" class="form-label font-weight-bold">Department :</label>
                        <select id="department" name="department_id" class="single-select">
                            <option value="">SELECT DEPARTMENT</option>
                            @foreach ($departments as $data )
                                <option value="{{$data->id}}">{{$data->department}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Designation :</label>
                        <input type="text" id="" name="designation" class="form-control" placeholder="Designation Name" value="{{old('designation')}}">
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- edit designation modal --}}
<div class="modal fade" id="editDesigModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('designation.store')}}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="" class="form-label font-weight-bold">Department :</label>
                        <select  name="department_id" class="single-select">
                            <option value="">SELECT DEPARTMENT</option>
                            @foreach ($departments as $data )
                                <option class="desigOption" value="{{$data->id}}">{{$data->department}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Designation :</label>
                        <input type="text" id="designation" name="designation" class="form-control" placeholder="Designation Name" value="{{old('designation')}}">
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- delete modal --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This will delete 'Designation' data too. Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <form id="deleteForm" action="{{route('department.destroy',0)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">YES</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{toastr()->error($error)}}

            @endforeach
        </ul>
    </div>
@endif --}}

@endsection

@section('script')

<script>

    $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('body').on('click', '.edit', function () {
        var id = $(this).data('value');

    // Construct the route dynamically
        var route = "{{ route('department.edit', ['department' => ':id']) }}";
        route = route.replace(':id', id);
        $.get(route, function(data) {
            $('#department').val(data.department);
        });
        var form = $('#departmentForm');
            var action = form.attr('action');
            // Replace the last part of the action attribute with the new id
            action = action.substring(0, action.lastIndexOf('/') + 1) + id;
            form.attr('action', action);
    });


    $('body').on('click', '.delt', function () {
        var id = $(this).data('value');

        var form = $('#deleteForm');
            var action = form.attr('action');
            // Replace the last part of the action attribute with the new id
            action = action.substring(0, action.lastIndexOf('/') + 1) + id;
            form.attr('action', action);

    });

    //designation
    $('body').on('click', '.editDesig', function () {
        var id = $(this).data('value');
        var givenId = 2;
        // Loop through each option
        // var options = document.getElementsByClassName("desigOption");

        // for (var i = 0; i < options.length; i++) {
        //     var option = options[i];

        //     // Check if the option's value matches the given ID
        //     if (option.value == 1) {
        //         // Set the option as selected
        //         option.selected = true;
        //         // Optionally, you can break the loop if you only want to select the first matching option
        //         // break;
        //     }
        // }

    // Construct the route dynamically
        var route = "{{ route('designation.edit', ['designation' => ':id']) }}";
        route = route.replace(':id', id);
        $.get(route, function(data) {
            $('#designation').val(data.designation);
            var departmentId = data.department_id;
            $('.desigOption[value="' + departmentId + '"]').prop('selected', true);
             // Set the selected department option
            // givenId = data.department_id;

            var departmentId = data.department_id;
            console.log("Department ID from data:", departmentId);

            // Select the option based on the department ID
            $('.desigOption').prop('selected', false); // Deselect all options first
            $('.desigOption[value="' + departmentId + '"]').prop('selected', true);

            // Log the number of selected options
            console.log("Number of selected options:", $('.desigOption:selected'));
        });


            var form = $('#departmentForm');
            var action = form.attr('action');
            // Replace the last part of the action attribute with the new id
            action = action.substring(0, action.lastIndexOf('/') + 1) + id;
            form.attr('action', action);
    });
    $('body').on('click', '.delt', function () {
        var id = $(this).data('value');

        var form = $('#deleteForm');
            var action = form.attr('action');
            // Replace the last part of the action attribute with the new id
            action = action.substring(0, action.lastIndexOf('/') + 1) + id;
            form.attr('action', action);

    });
});



  </script>
    <!-- Datatable -->
    <script src="{{asset('dashboard_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
