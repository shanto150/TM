@extends('home.home')
@section('content')
    <div class="container ">
        <div class="mx-auto ">

            <div class="card card-primary">
                <div class="card-header" style="background-image: linear-gradient(to bottom, #000428, #073863);">
                    <h3 class="card-title">User List</h3>
                    <div class="card-tools">
                        <div class="my-buttons"></div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="EntryTable" width="100%">

                        <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
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
@endsection
@push('script')
    <script type="text/javascript">

        var table = $('#EntryTable').DataTable({
            processing: false,
            serverSide: false,
            responsive: true,
            columnDefs: [{
                "defaultContent": "N/A",
                "targets": "_all"
            }],
            ajax: "{{ route('getuser') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    render: function(data, type, row) {
                        var name = row.name;
                        var desig =row.designation;
                        var html = '';
                        html +='<div>'+name+'</div>';
                        html +='<div>'+desig+'</div>';
                        return html;
                    }
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    render: function(data, type, row) {
                        var orderby = row.orderby;
                        var status = row.status;
                        if (orderby==0) {
                            var html = '';
                            html +=' <span class="badge badge-success">'+status+'</span>';
                            return html;
                        } else {
                            var html = '';
                            html +=' <span class="badge badge-danger">'+status+'</span>';
                            return html;
                        }

                    }
                },
                {
                    render: function(data, type, row) {
                        var idd = "'" + row.id + "'";
                        var uvs =  "'unverified'";
                        var vs =  "'verified'";
                        var orderby = row.orderby;

                        if (orderby==0) {
                            var html = '';
                            html += '<div class="d-flex justify-content-center align-items-center">';
                            html +=
                                '<button class="btn btn-sm btn-danger hvr-grow m-1" style="width: 140px" onclick="ststusUpdate(' +idd+','+uvs+');">';
                            html += '<i class="ri-close-line"></i> | UNVERIFY USER</button>';
                            html += '</div>';
                            return html;
                        } else {
                            var html = '';
                            html += '<div class="d-flex justify-content-center align-items-center">';
                            html +=
                                '<button class="btn btn-sm btn-success hvr-grow m-1" style="width: 140px" onclick="ststusUpdate(' +idd+','+vs+');">';
                            html += '<i class="ri-check-double-line"></i> | VERIFY USER</button>';
                            html += '</div>';
                            return html;
                        }

                    }
                },
            ]
        });

        function ststusUpdate(userid,status) {
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
                    data: { 'user_id':userid,'status':status},
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
