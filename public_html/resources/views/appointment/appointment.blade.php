@extends('layouts.app1')

@section('title', 'MyDiabetics | Appointment')

@section('content')

    <div class='container-fluid'>


        <div class='row'>
            <div class='col-md-10 task-btn flex-container'>
                <div class="">
                    <a href='/appointment/add' class="btn btn-success btn-tasks"><i class="fas fa-plus"></i>&nbsp;Add Appointment</a>
                </div>

                <div class="">
                    <a href='/appointment' class="btn btn-secondary"><i class="fas fa-file"></i>&nbsp;All Appointments</a>
                </div>

                <div class="">
                    <a href='/appointment/upcoming' class="btn btn-info text-light"><i
                        class="fas fa-hourglass-half"></i>&nbsp;Upcoming Appointments</a>
                </div>

                <div class="">
                    <a href='/appointment/history' class="btn btn-warning text-secondary"><i
                        class="fas fa-history"></i>&nbsp;Appointment History</a>
                </div>
                
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class='task-table table-responsive x-content col-md-10 col-sm-10 col-lg-10'>
                <div class="modal-header" style='background:#50bb7f;'>
                    <h4 class="modal-title text-center text-light">List of Appointments</h4>
                </div>
                <br>
                <table class='table table-hover table-sm ' id="dataTable" width="100%" cellspacing="0">
                    <thead class='thead-light'>
                        <tr>
                            <th>Date</th>
                            <th>Appointment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($appointments as $appointment)
                            <?php
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $startTimeStamp = strtotime(date('Y-m-d'));
                            $endTimeStamp = strtotime($appointment->appointment_date);

                            $timeDiff = $endTimeStamp - $startTimeStamp;

                            $numberDays = $timeDiff / 86400;

                            $numberDays = intval($numberDays);
                            $appointment->days = $numberDays;
                            $appointment->save();
                            ?>
                            <tr>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment }}</td>
                                <td>
                                    @if ($appointment->completed == 0)
                                        <span class='text-danger'>Unattended</span>
                                    @else
                                        <span class="text-success">Attended</span>
                                    @endif
                                </td>
                                <td class='action d-flex justify-content-center'>
                                    <div class='form-row'>
                                        <form action="/appointment/{{ $appointment->id }}/edit" method="post">
                                            @csrf
                                            @if ($appointment->completed == 0)
                                                <button href="" class='btn btn-info btn-sm text-white' data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"><i class='fas fa-edit'></i></button>
                                            @else
                                                <button href="" class='btn btn-info btn-sm text-white' data-toggle="tooltip"
                                            data-placement="bottom" title="Edit" disabled><i class='fas fa-edit'></i></button>
                                            @endif
                                        </form>
                                        &nbsp;&nbsp;&nbsp;
                                        <form action="/appointment/{{ $appointment->id }}" method="post"
                                            onclick="return checkDelete()">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class='btn btn-danger btn-sm' data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"><i
                                                    class='fas fa-trash-alt'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dTable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("appointment_date")[0].setAttribute('min', today);

    </script>
@endsection
