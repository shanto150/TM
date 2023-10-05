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
                                New Feedback
                            </h5>

                            <img src="{{ URL::asset('resources/images/appimages/spin.png') }}" alt="profile Pic"
                                height="30" width="30" id="modelSpinner" />

                        </div>

                        <div class="modal-body">

                            <div class="row m-0">

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="f_date" form="myform" name="f_date"
                                            class="form-control daterange" placeholder="f_date" autocomplete="off">
                                        <label for="f_date">Feedback Date</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="f_type"
                                                name="f_type">
                                                <option selected value="">Choose...</option>
                                                <option value="OTA">OTA</option>
                                                <option value="Airlines">Airlines</option>
                                                <option value="Market Rumors">Market Rumors</option>
                                            </select>
                                            <label for="f_type">Feedback Type</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" name="id" id="id" form="myform" value="0" hidden>

                                <div class="col-md-4">
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
                                            <select class="custom-select select2" form="myform" id="offer_category"
                                                name="offer_category">
                                                <option selected value="">Choose...</option>
                                                <option value="Cashback">Cashback</option>
                                                <option value="Discount">Discount</option>
                                                <option value="Markup">Markup</option>
                                            </select>
                                            <label for="offer_category">Offer Category</label>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row m-0">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="airline_id"
                                                name="airline_id">
                                                <option selected value="">Choose...</option>
                                                @foreach ($airlines as $airline)
                                                    <option value="{{ $airline->id }}">{{ $airline->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="airline_id">Airline Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" form="myform" id="channel"
                                                name="channel">
                                                <option selected value="None">None</option>
                                                <option value="Direct API">Direct API</option>
                                                <option value="ALL GDS">ALL GDS</option>
                                                <option value="Website">Website</option>
                                                <option value="Amadeus">Amadeus</option>
                                                <option value="Galileo">Galileo</option>
                                                <option value="Sabre">Sabre</option>
                                                <option value="Apollo">Apollo</option>
                                                <option value="Worldspan">Worldspan</option>
                                                <option value="Abacus">Abacus</option>
                                            </select>
                                            <label for="channel">Channel</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="discount_value" form="myform" name="discount_value"
                                            class="form-control" placeholder="discount_value" autocomplete="off">
                                        <label for="discount_value">Offers</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-label-group in-border">
                                        <input type="text" id="additional_discount" form="myform"
                                            name="additional_discount" class="form-control"
                                            placeholder="additional_discount" autocomplete="off">
                                        <label for="additional_discount">Additional Discount</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-label-group in-border">
                                            <select class="custom-select select2" onchange="getdistricts(this.value)"
                                                form="myform" id="area_type" name="area_type">
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

                                <div class="col-md-4 ">
                                    <div class="border border-01 p-3" style=" height: 115px; border-radius: 5px;">

                                        <div class="d-flex flex-column">
                                            <div class="form-group text-center m-0">

                                                <label>Validity : </label>
                                                <div class="icheck-peterriver d-inline">
                                                    <input type="radio" onclick="RadioChange('Days')" value="Days"
                                                        id="radioPrimary1" name="Validity_type" checked>
                                                    <label for="radioPrimary1">Days</label>
                                                </div>
                                                <div class="icheck-peterriver d-inline">
                                                    <input type="radio" onclick="RadioChange('range')"
                                                        value="Date Range" id="radioPrimary2" name="Validity_type">
                                                    <label for="radioPrimary2">Date Range</label>
                                                </div>

                                            </div>

                                            <div class="form-label-group in-border" id="day_id">
                                                <input type="text" id="days" value="" form="myform"
                                                    name="days" class="form-control">
                                                <label for="daterange">Days</label>
                                            </div>


                                            <div class="input-group form-label-group in-border d-none" id="range_id">
                                                <input type="text" class="form-control daterange" id="daterangea">
                                                <label for="daterange">Date Range</label>
                                                <div class="input-group-append">
                                                    <div class="input-group-text" id="rangeButton"><i class="fa fa-calendar" style="color:blue"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-label-group in-border">
                                        <textarea id="note" name="note" form="myform" style="text-transform:capitalize" class="form-control"
                                            cols="60" rows="4"></textarea>
                                        <label for="note">Note</label>
                                    </div>
                                </div>

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
                                    <th>Party-Channel</th>
                                    <th>Airlines-Extra Discount</th>
                                    <th>Duration-Place</th>
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
        var rValues = 'Days';

        var vdistrict = '';
        var vcity = '';
        var district_val = '';

        $('#rangeButton').on('click', function() {
            $('input[id="daterangea"]').trigger('click');

        });

        function RadioChange(rValue) {

            if (rValue == 'Days') {
                $('#days').val('');
                $('#day_id').removeClass('d-none');
                $('#range_id').addClass('d-none');
                $('#daterangea').val("");
                rValues = 'Days'
            } else {
                $('#days').val('');
                $('#range_id').removeClass('d-none');
                $('#day_id').addClass('d-none');
                $('#daterangea').val("");
                rValues = 'Range'
            }
        }

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
            ajax: "{{ route('feedback_get') }}",
            columns: [{
                    render: function(data, type, row) {
                        var fdate = row.fdate;
                        var f_type = row.f_type;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + fdate + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + f_type + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var partyandchennel = row.partyandchennel;
                        var offers = row.offers;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + partyandchennel + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + offers + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var airline_name = row.airline_name;
                        var additional_discount = row.additional_discount;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + airline_name + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + additional_discount +
                            '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var duration = row.duration;
                        var place = row.place;
                        var html = '';
                        html += '<div class="d-flex flex-column">';
                        html += '<div>' + duration + '</div>';
                        html += '<div style="color: blue;font-size: 14px;">' + place + '</div>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    render: function(data, type, row) {
                        var fdate = "'" + row.fdate + "'";
                        var f_type = "'" + row.f_type + "'";
                        var party_id = "'" + row.party_id + "'";
                        var offer_category = "'" + row.offer_category + "'";
                        var airline_id = "'" + row.airline_id + "'";
                        var channel = "'" + row.channel + "'";
                        var discount_value = "'" + row.discount_value + "'";
                        var additional_discount = "'" + row.additional_discount + "'";
                        var area_type = "'" + row.area_type + "'";
                        var area_id = "'" + row.area_id + "'";
                        var Validity_type = "'" + row.Validity_type + "'";
                        var days = "'" + row.days + "'";
                        var duration = "'" + row.duration + "'";
                        var rowID = "'" + row.id + "'";
                        var html = '';
                        html += '<div class="d-flex justify-content-center">';
                        html += '<button type="button" onclick="edit_model(' + fdate + ',' + f_type + ',' +
                            party_id + ',' + offer_category + ',' + airline_id + ',' + channel + ',' +
                            discount_value + ',' + additional_discount + ',' + area_type + ',' + area_id +
                            ',' + Validity_type + ',' + days +
                            ','+duration+','+rowID+')" class="btn btn-sm btn-outline-primary mr-1"><i class="fa fa-pen"></i></button>';
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

                    console.log(ctn);
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
            var x = ['f_date', 'f_type'];
            if (EmptyValueFocus(x)) {
                save();
            }
        }

        //Store
        function save() {

            var allInputs = $("#myform").serialize();
            var formData = new FormData(myform);

            formData.append('f_date', moment($('#f_date').val()).format("YYYY-MM-DD"));

            if (rValues == "Range") {
                let fullRange = $('#daterangea').val();
                const dr = fullRange.split("~");
                formData.append('from_date', moment(dr[0]).format("YYYY-MM-DD"));
                formData.append('to_date', moment(dr[1]).format("YYYY-MM-DD"));
            }


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
                    url: "{{ route('feedback_store') }}",
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
        function edit_model(fdate, f_type, party_id, offer_category, airline_id, channel, discount_value,
            additional_discount, area_type, area_id, Validity_type, days,duration,rowID) {

            // console.log(fdate);
            var keysArray = ['discount_value', 'additional_discount','id'];
            var valuesArray = [discount_value, additional_discount,rowID];

            editValuePst(keysArray, valuesArray);
            $('#f_date').val(fdate);
            $('#f_type').val(f_type).change();
            $('#party_id').val(party_id).change();
            $('#party_id').val(party_id).change();
            $('#offer_category').val(offer_category).change();
            $('#airline_id').val(airline_id).change();
            $('#channel').val(channel).change();
            $('#area_type').val(area_type).change();


            if (Validity_type == 'Days') {
                $('#days').val(days.replace('null',''));
                $('#day_id').removeClass('d-none');
                $('#range_id').addClass('d-none');
                $('#daterangea').val("");
                $("#radioPrimary1").prop('checked', true);

                rValues = 'Days'
            } else {
                $('#days').val('');
                $('#range_id').removeClass('d-none');
                $('#day_id').addClass('d-none');
                $('#daterangea').val(duration);
                $('#radioPrimary2').prop('checked', true);
                rValues = 'Range'
            }

            setTimeout(
                function() {
                    $('#area_id').val(area_id).change();
                }, 1000);

            $("#myModal").modal('show');

            firstValue = $("#myform").serialize();
        }

        function Close() {
            $('#party_type').val(null).change();
            $('#category').val(null).change();
            $('#division').val(null).change();
            $('#district').val(null).change();
            $('#f_type').val(null).change();
            $('#city').val(null).change();
            $('#airline_id').val(null).change();
            $('#days').val('');
            $('#day_id').removeClass('d-none');
            $('#range_id').addClass('d-none');
            $('#daterangea').val("");
            rValues = 'Days'
            document.getElementById('myform').reset();
            $("#myModal").modal('hide');
        }

        function Clean() {
            $('#party_type').val(null).change();
            $('#category').val(null).change();
            $('#division').val(null).change();
            $('#district').val(null).change();
            $('#f_type').val(null).change();
            $('#city').val(null).change();
            $('#airline_id').val(null).change();
            $('#days').val('');
            $('#day_id').removeClass('d-none');
            $('#range_id').addClass('d-none');
            $('#daterangea').val("");
            rValues = 'Days'
            document.getElementById('myform').reset();
        }

        //Date range picker
        $('#daterangea').daterangepicker({
            autoApply: true,
            showDropdowns: true,
            "locale": {
                "format": "DD-MMM-YYYY",
            }
        });

        $('#daterangea').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MMM-YYYY') + '~' + picker.endDate.format('DD-MMM-YYYY'));
        });

        $('#daterangea').on('hide.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MMM-YYYY') + '~' + picker.endDate.format('DD-MMM-YYYY'));
        });

        $('#f_date').daterangepicker({
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
