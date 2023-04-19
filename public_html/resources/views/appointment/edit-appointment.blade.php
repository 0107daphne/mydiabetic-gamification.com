@extends('layouts.app1')

@section('title', 'MyDiabetics | Appointment')

@section('content')


    <div class='container'>
        <div class="create-task col-lg-12">
            <div class="modal-header" style='background:mediumseagreen;'>
                <h4 class="modal-title text-center text-light">EDIT APPOINTMENT</h4>
                <a href="/appointment" class="btn text-light" aria-label="Cancel Edit"><i class='fas fa-times'
                        style='font-size:24px'></i></a>
            </div>
            <br>
            <form action="/appointment/{{ $appointment->id }}" method="POST">
                {{-- @method('PATCH') --}}
                @csrf
                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="appointment" class='form-lbl'>Appointment</label>
                        <input type="text" class='form-control' placeholder="Appointment" required name="appointment"
                            value="{{ $appointment->appointment }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="appointment_date" class='form-lbl'>Date</label>
                        <input type="date" class='form-control' required name="appointment_date" id="appointment_date"
                            value="{{ $appointment->appointment_date }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="completed" class='form-lbl'>Status: <span><em><small>(Once confirmed, status cannot be changed back)</small></em></span></label>
                        <select name="completed" id="completed" required class="form-control">

                            <option value="{{ $appointment->completed }}">
                                @if ($appointment->completed == 0)
                                    Unattended
                                @elseif($appointment->completed == 1)
                                    Attended
                                @endif
                            </option>
                            @if ($appointment->completed == 0)
                                <option value="1">Attended</option>
                            @elseif($appointment->completed == 1)
                                <option value="0">Unattended</option>
                            @endif
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a class="btn btn-danger" href='/appointment'>Cancel</a>
            </form>
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
        document.getElementsByName("deadline")[0].setAttribute('min', today);

    </script>
@endsection
