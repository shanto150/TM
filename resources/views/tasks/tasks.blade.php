@extends('home.home')

<style>
    .wrapper {
        padding-bottom: 10px;
    }

    .divider {
        position: relative;
        margin-top: 10px;
        height: 1px;
    }

    .div-transparent:before {
        content: "";
        position: absolute;
        top: 0;
        left: 5%;
        right: 5%;
        width: 90%;
        height: 1px;
        background-image: linear-gradient(to right, transparent, rgb(48, 49, 51), transparent);
    }

    .div-arrow-down:after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -7px;
        left: calc(50% - 7px);
        width: 14px;
        height: 14px;
        transform: rotate(45deg);
        background-color: white;
        border-bottom: 1px solid rgb(48, 49, 51);
        border-right: 1px solid rgb(48, 49, 51);
    }

    .div-tab-down:after {
        content: "";
        position: absolute;
        z-index: 1;
        top: 0;
        left: calc(50% - 10px);
        width: 20px;
        height: 14px;
        background-color: white;
        border-bottom: 1px solid rgb(48, 49, 51);
        border-left: 1px solid rgb(48, 49, 51);
        border-right: 1px solid rgb(48, 49, 51);
        border-radius: 0 0 8px 8px;
    }

    .div-stopper:after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -6px;
        left: calc(50% - 7px);
        width: 14px;
        height: 12px;
        background-color: white;
        border-left: 1px solid rgb(48, 49, 51);
        border-right: 1px solid rgb(48, 49, 51);
    }

    .div-dot:after {
        content: "";
        position: absolute;
        z-index: 1;
        top: -9px;
        left: calc(50% - 9px);
        width: 18px;
        height: 18px;
        background-color: goldenrod;
        border: 1px solid rgb(48, 49, 51);
        border-radius: 50%;
        box-shadow: inset 0 0 0 2px white,
            0 0 0 4px white;
    }
</style>

@section('content')
    <div class="container-fluid">

        {{-- modal --}}
        <div class="modal zoomer" id="myModal" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <form id="myform">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <span class="btn circle-icon">
                                    <i class="fa fa-plus"></i>
                                </span>
                                New Task
                            </h5>

                            <img src="{{ URL::asset('resources/images/appimages/spin.png') }}" alt="profile Pic"
                                height="30" width="30" id="modelSpinner" />

                        </div>

                        <div class="modal-body">


                            <div class="row m-0">

                                <div class="col-md-8 m-0">

                                    <div class="row m-0">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="custom-select select2" form="myform" id="party_id"
                                                        name="party_id">
                                                        <option selected value="">Choose...</option>
                                                        @foreach ($parties as $partie)
                                                            <option value="{{ $partie->id }}">{{ $partie->name }} -
                                                                {{ $partie->party_type }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="party_id">Party Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="form-control" form="myform" id="task_type"
                                                        name="task_type">
                                                        <option selected value="">Choose...</option>
                                                        <option value="Sales Call">Sales Call</option>
                                                        <option value="Meeting">Meeting</option>
                                                        <option value="Phone Call">Phone Call</option>
                                                        <option value="Follow up">Follow up</option>
                                                    </select>
                                                    <label for="task_type">Task Type</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="form-control" form="myform" id="priority"
                                                        name="priority">
                                                        <option selected value="">Choose...</option>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                    <label for="priority">Priority</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row m-0">

                                        <div class="col-md-3">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="task_date" form="myform" name="task_date"
                                                    class="form-control daterange" autocomplete="off">
                                                <label for="task_date">Task Date</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">

                                            <div class="form-label-group in-border">
                                                <input type="time" id="start_time"
                                                    onchange="getTimeDiff($('#start_time').val(),$('#end_time').val())"
                                                    form="myform" name="start_time" class="form-control"
                                                    autocomplete="off">
                                                <label for="start_time">Start Time</label>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-label-group in-border">
                                                <input type="time" id="end_time"
                                                    onchange="getTimeDiff($('#start_time').val(),$('#end_time').val())"
                                                    form="myform" name="end_time" class="form-control" autocomplete="off">
                                                <label for="end_time">End Time</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="duration" form="myform" name="duration"
                                                    class="form-control" autocomplete="off">
                                                <label for="Duration">Duration(Minites)</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row m-0">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="form-control" form="myform" id="zone"
                                                        name="zone">
                                                        <option selected value="">Choose...</option>
                                                        <option value="Left">Left</option>
                                                        <option value="Right">Right</option>
                                                        <option value="Middle">Middle</option>
                                                        <option value="Top">Top</option>
                                                    </select>
                                                    <label for="Zone">Zone</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="custom-select select2"
                                                        onchange="getdistricts(this.value)" form="myform" id="area_type"
                                                        name="area_type">
                                                        <option selected value="">Choose...</option>
                                                        <option value="Division">Division</option>
                                                        <option value="District">District</option>
                                                        <option value="City">City</option>
                                                    </select>
                                                    <label for="area_type">Area Type</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="custom-select select2" form="myform" id="area_id"
                                                        name="area_id">
                                                        <option selected value="">Choose...</option>

                                                    </select>
                                                    <label for="area_id">Area Name</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row m-0">

                                        <div class="col-md-12">
                                            <div class="form-label-group in-border">
                                                <input type="text" id="title" form="myform" name="title"
                                                    class="form-control" autocomplete="off">
                                                <label for="title">Title</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row m-0">

                                        <div class="col-md-12">
                                            <div class="form-label-group in-border">
                                                <textarea id="note" name="note" form="myform" style="text-transform:capitalize" class="form-control"
                                                    cols="60" rows="4"></textarea>
                                                <label for="note">Note</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="row m-0">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-label-group in-border">
                                                    <select class="select2" form="myform" id="assign_to"
                                                        name="assign_to">
                                                        <option selected value="">Choose...</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }} -
                                                                {{ $user->designation }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="assign_to">Assign To</label>
                                                </div>
                                            </div>


                                            <div class="wrapper">
                                                <div class="divider div-transparent div-arrow-down"></div>
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt-3">

                                            <div class="form-groups">
                                                <div class="form-label-group in-border">
                                                    <select class="select2 custom-select" id="user_id" name="user_id[]"
                                                        multiple="multiple" data-placeholder="Select a State">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="user_id">+ Group People</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <input type="text" name="id" id="id" form="myform" value="0"
                                    hidden>

                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="Close()" data-target="#myModal"
                                data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>

                            <button type="button" onclick="Clean();" class="btn btn-warning me-5"><i
                                    class="fa fa-eraser" aria-hidden="true"></i>
                                Clear</button>
                            <button type="button" onclick="FromsCheck();" class="btn btn-success"><i
                                    class="fa fa-check" aria-hidden="true"></i> Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{-- End modal --}}


        {{-- list --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <span class="btn circle-icon">
                                <i class="fa fa-plane fa-2xs"></i>
                            </span>
                            Feedback List
                        </h3>
                        <div class="card-tools">
                            <button type="button" data-toggle="modal" data-target="#myModal"
                                class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="EntryTable" width="100%">

                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Priority</th>
                                    <th>Party Category</th>
                                    <th>Time Duration</th>
                                    <th>Assign To</th>
                                    <th>Zone Area</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- list end --}}

    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });

        function getTimeDiff(StartTime, EndTime) {
            if (StartTime && EndTime) {
                const startTime = moment($('#start_time').val(), "HH:mm");
                const EndTime = moment($('#end_time').val(), "HH:mm");
                if (EndTime.diff(startTime, 'minutes') < 0) {
                    message('Wrong Time Selected !', '#FECC43', '#1A389F', 'info', 'Info');
                    $('#duration').val('');
                    $('#end_time').val('');
                } else {
                    $('#duration').val(EndTime.diff(startTime, 'minutes'));
                }
            }

        }


        var firstValue = $("#myform").serialize();
        $('#spinShowHide').hide();
        $('#modelSpinner').hide();

        var vdistrict = '';
        var vcity = '';
        var district_val = '';

        // create Datatable
        var table = $('#EntryTable').DataTable({
            processing: false,
            serverSide: false,
            responsive: true,
            columnDefs: [{
                "defaultContent": "N/A",
                "targets": "_all",
                "orderable": false
            }],
            ajax: "{{ route('task_get') }}",
            columns: [{
                    render: function(data, type, row) {
                        var task_date = row.task_date;
                        var task_type = row.task_type;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + task_date + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + task_type + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var priority = row.priority;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + priority + '</div>';
                        html += '<div style="color: blue;font-size: 14px;"></div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var name = row.name;
                        var type_category = row.type_category;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + name + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + type_category + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var st_et = row.st_et;
                        var duration = row.duration;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + st_et + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + duration +
                            '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var assign_to = row.assign_to;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + assign_to + '</div>';
                        html += '<div style="color: blue;font-size: 14px;"></div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var zone = row.zone;
                        var area = row.area;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + zone + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + area +
                            '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var status = row.status;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + status + '</div>';
                        html += '<div style="color: blue;font-size: 14px;"></div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var party_id = "'" + row.party_id + "'";
                        var task_type = "'" + row.task_type + "'";
                        var task_date = "'" + row.task_date + "'";
                        var start_time = "'" + row.start_time + "'";
                        var end_time = "'" + row.end_time + "'";
                        var duration = "'" + row.duration1 + "'";
                        var priority = "'" + row.priority + "'";
                        var assign_to = "'" + row.assign_to1 + "'";
                        var area_type = "'" + row.area_type + "'";
                        var area_id = "'" + row.area_id + "'";
                        var zone = "'" + row.zone + "'";
                        var rowID = "'" + row.id + "'";
                        var title = "'" + row.title + "'";
                        var note = "'" + row.note + "'";
                        var html = '';
                        html += '<div class="d-flex justify-content-center">';
                        html += '<button type="button" onclick="edit_model(' + party_id + ',' + task_type +
                            ',' +
                            task_date + ',' + start_time + ',' + end_time + ',' + duration + ',' +
                            priority + ',' + assign_to + ',' + area_type + ',' + area_id + ',' + zone +
                            ',' + title + ',' + note + ',' + rowID +
                            ')" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-pen"></i></button>';
                        html +=
                            '<button type="button" class="btn btn-sm btn-outline-danger" ><i class="fa fa-trash"></i></button>';
                        html += '</div>';
                        return html;

                    }
                },
            ]
        });

        //get district
        function getdistricts(requestType) {

            if (requestType == '') {
                $("#area_id").empty();
                $("#area_id").append('<option value="">Choose...</option>');
            }
            $.ajax({
                type: 'GET',
                url: "{{ route('feedback_ddc') }}", // Route
                data: {
                    'requestType': requestType
                },
                dataType: "json",
                beforeSend: function() {
                    $("#modelSpinner").addClass("spinner");
                    $('#modelSpinner').show();
                },
                error: function(res) {
                    $("#modelSpinner").removeClass("spinner");
                    $('#modelSpinner').hide();
                },
                complete: function() {
                    $("#modelSpinner").removeClass("spinner");
                    $('#modelSpinner').hide();
                },
                success: function(data) {
                    ctn = data.data.length;

                    // console.log(ctn);
                    if (ctn > 0) {
                        // $('#area_id').val(null).change();
                        $("#area_id").empty();
                        $.each(data.data, function(key, value) {
                            $("#area_id").append('<option value="' + value.id + '">' + initCap(value
                                .name_en) + '</option>');
                        });

                    } else {
                        $('#area_id').html('<option value="">Nothing Found</option>');
                    }
                }
            });
        }

        //form validation and message
        function FromsCheck() {
            var x = ['task_date', 'task_date'];
            if (EmptyValueFocus(x)) {
                save();
            }
        }

        //Store
        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);
            var newDt = moment($('#task_date').val(), "DD-MMM-YYYY")
            formData.append('task_date', moment(newDt).format("YYYY-MM-DD"));

            if (firstValue == allInputs) {
                message('Nothing changed !', '#FECC43', '#1A389F', 'info', 'Info');
            } else {
                $.ajax({
                    beforeSend: function() {
                        $("#modelSpinner").addClass("spinner");
                        $('#modelSpinner').show();
                    },
                    error: function(res) {
                        $("#modelSpinner").removeClass("spinner");
                        $('#modelSpinner').hide();
                        const ErrowArray = res.responseJSON['message'];
                        const EE = res.responseJSON['exception'];
                        const msgs = ErrowArray.split(':');
                        if (EE == 'ErrorException') {
                            message(ErrowArray, '#FF0000', 'white', 'error', 'Error');
                        } else {
                            message(msgs[2], '#FF0000', 'white', 'error', msgs[1]);
                        }
                    },
                    complete: function() {
                        $("#modelSpinner").removeClass("spinner");
                        $('#modelSpinner').hide();
                    },
                    type: 'POST',
                    url: "{{ route('task_store') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        if (res.types == 'e') {
                            message(res.messege, '#FF0000', 'white', 'error', 'error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                            $('#party_id').val(null).change();
                            $('#assign_to').val(null).change();
                            $('#area_id').val(null).change();
                            $('#user_id').val(null).change();
                            document.getElementById('myform').reset();
                            $("#myModal").modal('hide');
                            $('#EntryTable').DataTable().ajax.reload();
                        }
                    }
                });
            }

        }

        //Edit model
        function edit_model(party_id, task_type, task_date, start_time, end_time, duration, priority,
            assign_to, area_type, area_id, zone, title, note, rowID) {


            getGroupPeople(rowID);
            // console.log(fdate);
            var keysArray = ['duration', 'title', 'note', 'id'];
            var valuesArray = [duration, title, note, rowID];

            editValuePst(keysArray, valuesArray);

            $('#start_time').val(start_time);
            $('#end_time').val(end_time);
            $('#zone').val(zone);
            $('#task_date').val(task_date);
            $('#party_id').val(party_id).change();
            $('#priority').val(priority).change();
            $('#assign_to').val(assign_to).change();
            $('#task_type').val(task_type).change();
            $('#area_type').val(area_type).change();

            setTimeout(
                function() {
                    $('#area_id').val(area_id).change();
                }, 1000);

            $("#myModal").modal('show');

            firstValue = $("#myform").serialize();
        }

        //getGroupPeople
        function getGroupPeople(rTaskID) {

            $.ajax({
                type: 'GET',
                url: "{{ route('getGroup') }}", // Route
                data: {
                    'rTaskID': rTaskID
                },
                dataType: "json",
                beforeSend: function() {
                    $("#modelSpinner").addClass("spinner");
                    $('#modelSpinner').show();
                },
                error: function(res) {
                    $("#modelSpinner").removeClass("spinner");
                    $('#modelSpinner').hide();
                },
                complete: function() {
                    $("#modelSpinner").removeClass("spinner");
                    $('#modelSpinner').hide();
                },
                success: function(data) {
                    ctn = data.data.length;
                    var GParray = new Array();
                    if (ctn > 0) {
                        $.each(data.data, function(key, value) {
                            GParray.push(value.user_id.toString());
                        });
                    }
                    $('#user_id').val(GParray).change();

                }
            });
        }

        function Close() {
            $('#party_id').val(null).change();
            $('#assign_to').val(null).change();
            $('#area_id').val(null).change();
            $('#user_id').val(null).change();
            document.getElementById('myform').reset();
            $("#myModal").modal('hide');
        }

        function Clean() {
            $('#party_id').val(null).change();
            $('#assign_to').val(null).change();
            $('#area_id').val(null).change();
            $('#user_id').val(null).change();
            document.getElementById('myform').reset();
        }


        $('#task_date').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            showDropdowns: true,
            "locale": {
                "format": "DD-MMM-YYYY",
            },
        });
    </script>

    <script>
        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type') }}"
            var mess = "{{ Session::get('messege') }}"
            switch (type) {
                case 's':
                    message(mess, '#53C75F', 'white', 'error');
                    break;
                case 'e':
                    message(mess, '#FF0000', 'white', 'error');
                    break;
            }
        @endif
    </script>
@endpush
