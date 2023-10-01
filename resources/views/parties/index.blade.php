@extends('home.home')

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
                                New Party
                            </h5>

                            <img src="{{ URL::asset('resources/images/appimages/spin.png') }}" alt="profile Pic"
                                height="30" width="30" id="modelSpinner" />

                        </div>

                        <div class="modal-body">

                            <div class="row m-0">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="party_type"
                                                name="party_type">
                                                <option selected value="">Choose...</option>
                                                <option value="Travel Agency">Travel Agency</option>
                                                <option value="OTA">OTA</option>
                                                <option value="Airlines">Airlines</option>
                                                <option value="Corporate">Corporate</option>
                                            </select>
                                            <label for="party_type">Party Type</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" name="id" id="id" form="myform" value="0" hidden>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="name" name="name" form="myform"
                                            style="text-transform:capitalize" class="form-control" placeholder="Party Name"
                                            autocomplete="off">
                                        <label for="name">Party Name</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="category"
                                                name="category">
                                                <option selected value="">Choose...</option>
                                                <option value="IATA">IATA</option>
                                                <option value="NON-IATA">NON-IATA</option>
                                                <option value="Legacy">Legacy</option>
                                                <option value="LCC">LCC</option>
                                            </select>
                                            <label for="category">Category</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="established" form="myform" name="established"
                                            class="form-control daterange" placeholder="established" autocomplete="off">
                                        <label for="established">Established</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row m-0">

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="contact_name" form="myform"
                                            style="text-transform:capitalize" name="contact_name" class="form-control"
                                            placeholder="contact_name" autocomplete="off">
                                        <label for="contact_name">Primary Contact Name</label>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="designation" form="myform" name="designation"
                                            style="text-transform:capitalize" class="form-control" placeholder="Designation"
                                            autocomplete="off">
                                        <label for="designation">Designation</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="mobile" form="myform"
                                            onkeyup="MobileCountValidate(this);" maxlength="11" name="mobile"
                                            class="form-control" placeholder="mobile" autocomplete="off">
                                        <label for="mobile">Mobile</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="email" id="email" form="myform" name="email"
                                            class="form-control" oninput="isValidEmailAddress(this)" placeholder="Email"
                                            autocomplete="off">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row m-0">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="country"
                                                name="country">
                                                <option selected value="19">Bangladesh</option>
                                            </select>
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" id="division" form="myform" onchange="getdistricts(this.value,'')"
                                                 name="division">
                                                <option selected value="">Choose...</option>
                                                <option value="1">Barisal</option>
                                                <option value="2">Chattogram</option>
                                                <option value="3">Dhaka</option>
                                                <option value="4">Khulna</option>
                                                <option value="5">Mymensingh</option>
                                                <option value="6">Rajshahi</option>
                                                <option value="7">Rangpur</option>
                                                <option value="8">Sylhet</option>
                                            </select>
                                            <label for="division">Division</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" id="district" onchange="getCity(this.value,defult_val='')" form="myform" name="district">
                                                <option selected value="">Choose...</option>
                                            </select>
                                            <label for="division">Division</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="city"
                                                name="city">
                                                <option selected value="">Choose...</option>
                                            </select>
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row m-0">

                                <div class="col-md-6">
                                    <div class="form-label-group in-border">
                                        <textarea id="address" name="address" form="myform" style="text-transform:capitalize" class="form-control"
                                            cols="50" rows="3"></textarea>
                                        <label for="address">Full Address</label>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-label-group in-border">
                                        <textarea id="note" name="note" form="myform" style="text-transform:capitalize" class="form-control"
                                            cols="50" rows="3"></textarea>
                                        <label for="note">Note</label>
                                    </div>
                                </div>


                            </div>



                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="Close()" data-target="#myModal"
                                data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>

                            <button type="button" onclick="Clean();"
                                class="btn btn-warning me-5"><i class="fa fa-eraser" aria-hidden="true"></i>
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
                            Party List
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
                                    <th>Party</th>
                                    <th>Type and Category</th>
                                    <th>Primary Contact info</th>
                                    <th>Primary Contact</th>
                                    <th>Address</th>
                                    <th>Actions</th>
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
        var firstValue = $("#myform").serialize();
        $('#spinShowHide').hide();
        $('#modelSpinner').hide();

        var vdistrict = '';
        var vcity='';
        var district_val='';

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
            ajax: "{{ route('Get_party_Data') }}",
            columns: [
                {
                    render: function(data, type, row) {
                        var name = row.name;
                        var established = row.established;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + name + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + established + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var party_type = row.party_type;
                        var category = row.category;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + party_type + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + category + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var contact_name = row.contact_name;
                        var designation = row.designation;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + contact_name + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + designation + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var mobile = row.mobile;
                        var email = row.email;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + email + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + mobile + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var address = row.address;
                        var ddc = row.ddivision.replace('Division','')+'-'+row.ddistrict+'-'+row.dcity;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + address + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + ddc + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var name = "'" + row.name + "'";
                        var established = "'" + row.established + "'";
                        var contact_name = "'" + row.contact_name + "'";
                        var designation = "'" + row.designation + "'";
                        var mobile = "'" + row.mobile + "'";
                        var email = "'" + row.email + "'";
                        var address = "'" + row.address + "'";
                        var note = "'" + row.note + "'";
                        var rwid = "'" + row.id + "'";
                        var party_type = "'" + row.party_type + "'";
                        var category = "'" + row.category + "'";
                        var division = "'" + row.division + "'";
                        var district = "'" + row.district + "'";
                        var city = "'" + row.city + "'";
                        var html = '';
                        html += '<div class="d-flex justify-content-center">';
                        html += '<button type="button" onclick="edit_model(' + name + ',' + established +
                            ',' + contact_name + ',' + designation + ',' + mobile + ',' + email + ',' +
                            address + ',' + note + ',' + rwid + ',' + party_type + ',' + category + ',' +
                            division + ',' + district + ',' + city +
                            ');" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-pen"></i></button>';
                        html +=
                            '<button type="button" class="btn btn-sm btn-outline-danger" ><i class="fa fa-trash"></i></button>';
                        html += '</div>';
                        return html;

                    }
                },
            ]
        });

        //active inactive
        function ststusUpdate(userid, status) {
            $.ajax({
                beforeSend: function() {
                    $('#spn').show();
                    $("#spn").addClass("spinner");
                },
                error: function(res) {
                    $('#spn').hide();
                    $("#spn").removeClass("spinner");

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
                    $('#spn').hide();
                    $("#spn").removeClass("spinner");
                },
                type: 'GET',
                url: "{{ route('user_status_update') }}", // Route
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'user_id': userid,
                    'status': status
                },
                success: function(res) {
                    if (res.types == 'e') {
                        message(res.messege, '#FF0000', 'white', 'error', 'error');
                    } else {
                        message(res.messege, '#29912b', 'white', 'error', 'Success');
                        $('#EntryTable').DataTable().ajax.reload();
                    }
                }
            });
        }

        //get district
        function getdistricts(division_id,defult_val='') {
            $.ajax({
                type: 'GET',
                url: "{{ route('getdistricts') }}", // Route
                data: {
                    'division_id': division_id
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
                    ctn = data.districts_list.length;
                    if (ctn > 0) {
                        $('#district').html('<option value="">Choose...</option>');
                        $('#city').html('<option value="">Choose...</option>');

                        $.each(data.districts_list, function(key, value) {
                            if (defult_val==value.id) {
                                $("#district").append('<option selected value="' + value.id + '">' + initCap(value.name_en) + '</option>');
                            }
                                $("#district").append('<option value="' + value.id + '">' + initCap(value.name_en) + '</option>');
                        });
                        getCity(vdistrict,vcity);
                    } else {
                        $('#district').html('<option value="">Nothing Found</option>');
                    }
                }
            });
        }

        //get city
        function getCity(district_id,defult_val='') {
            $.ajax({
                type: 'GET',
                url: "{{ route('getCity') }}", // Route
                data: {
                    'district_id': district_id
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
                    ctn = data.city_list.length;
                    if (ctn > 0) {
                        $('#city').html('<option value="">Choose...</option>');
                        $.each(data.city_list, function(key, value) {
                            if (defult_val==value.id) {
                                $("#city").append('<option selected value="' + value.id + '">' + initCap(value.name_en) + '</option>');
                            }
                                $("#city").append('<option value="' + value.id + '">' + initCap(value.name_en) + '</option>');
                        });
                    } else {
                        $('#city').html('<option value="">Nothing Found</option>');
                    }
                }
            });
        }

        //form validation and message
        function FromsCheck() {
            var x = ['party_type', 'name', 'category'
            ];
            if (EmptyValueFocus(x)) {
                save();
            }
        }

        $('#established').daterangepicker({
            singleDatePicker: true,
            autoApply: true,
            showDropdowns: true,
            minYear: 1800,
            "locale": {
                "format": "DD-MMM-YYYY",
            },
        });

        //Store
        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);

            formData.append('established', moment($('#established').val()).format("YYYY-MM-DD"));

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
                    url: "{{ route('party-store') }}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(res) {
                        if (res.types == 'e') {
                            message(res.messege, '#FF0000', 'white', 'error', 'error');
                        } else {
                            message(res.messege, '#29912b', 'white', 'error', 'Success');
                            $('#party_type').val(null).change();
                            $('#category').val(null).change();
                            $('#division').val(null).change();
                            $('#district').val(null).change();
                            $('#city').val(null).change();
                            document.getElementById('myform').reset();
                            $("#myModal").modal('hide');
                            $('#EntryTable').DataTable().ajax.reload();
                        }
                    }
                });
            }

        }

        //Edit model
        function edit_model(name, established, contact_name, designation, mobile, email, address, note, rwid, party_type,
            category, division, district, city) {

            var keysArray = ['name', 'established', 'contact_name', 'designation', 'mobile', 'email', 'address', 'note',
                'id'
            ];
            var valuesArray = [name, established, contact_name, designation, mobile, email, address, note, rwid];

            editValuePst(keysArray, valuesArray);
            $('#party_type').val(party_type).change();
            $('#category').val(category).change();
            $('#division').val(division).change();

            getdistricts(division,district);

            vdistrict=district;
            vcity=city;

            firstValue = $("#myform").serialize();
            // $('#myModal').show();
            $("#myModal").modal('show');

        }

        function Close() {
            $('#party_type').val(null).change();
            $('#category').val(null).change();
            $('#division').val(null).change();
            $('#district').val(null).change();
            $('#city').val(null).change();
            document.getElementById('myform').reset();
            $("#myModal").modal('hide');
        }
        function Clean() {
            $('#party_type').val(null).change();
            $('#category').val(null).change();
            $('#division').val(null).change();
            $('#district').val(null).change();
            $('#city').val(null).change();
            document.getElementById('myform').reset();
        }


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
