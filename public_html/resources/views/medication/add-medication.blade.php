@extends('layouts.app1')

@section('title', 'MyDiabetics | Medication')

@section('content')

    <div class="create-task col-lg-12">
        <div class="modal-header" style='background:mediumseagreen;'>
            <h4 class="modal-title text-center text-light">ADD MEDICATION RECORD</h4>
            <a href="/medication" class="btn text-light" style=" color:white;" aria-label="Cancel Edit"><i
                    class='fas fa-times' style='font-size:24px'></i></a>
        </div>
        <br>
        <form action="/medication" method="POST">

            @csrf
            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="medication" class='form-lbl'>Medication</label>
                    <input type="text" class='form-control' placeholder="Medication" required name="medication">
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="date_given" class='form-lbl'>Date Given</label>
                    <input type="date" class='form-control' required name="date_given" id="date_given" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="date_start" class='form-lbl'>Start Date</label>
                    <input type="date" class='form-control' required name="date_start" id="date_start" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="date_stop" class='form-lbl'>Stop Date</label>
                    <input type="date" class='form-control' required name="date_stop" id="date_stop" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="dosage" class='form-lbl'>Dosage</label>
                    <input type="text" class='form-control' required name="dosage" id="dosage" required>
                </div>
            </div>
            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="med_form" class='form-lbl'>Form(pill, injection, liquid, etc.)</label>
                    <input type="text" class='form-control' required name="med_form" id="med_form" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="frequency" class='form-lbl'>Frequency</label>
                    <input type="text" class='form-control' required name="frequency" id="frequency" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="directions" class='form-lbl'>Directions</label>
                    <input type="text" class='form-control' required name="directions" id="directions" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="reason" class='form-lbl'>Reason of Use</label>
                    <input type="text" class='form-control' required name="reason" id="reason" required>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="use" class='form-lbl'>Use(Regularly or Occasionally)</label>
                    <select name="use" id="use" required class="form-control">
                        <option value="">Select type of usage</option>
                        <option value="Regularly">Regularly</option>
                        <option value="Occasionally">Occasionally</option>
                    </select>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="status" class='form-lbl'>Status</label>
                    <select name="status" id="status" required class="form-control">
                        <option value="">Select status</option>
                        <option value="0">On-going</option>
                        <option value="1">Stopped</option>
                    </select>
                </div>
            </div>

            <div class='form-row'>
                <div class="form-group col-md-12">
                    <label for="note" class='form-lbl'>Note(s)</label>
                    <textarea name="note" id="note" rows="10" class='form-control'
                        placeholder="Is there any additional information?"></textarea>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
            <a class="btn btn-danger" href='/medication'>Cancel</a>
        </form>
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

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    {{-- <script>
        $(function() {
            $('input[name="date_given"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            }, function(start, end, label) {

            });
        });

    </script>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });

    </script> --}}

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
