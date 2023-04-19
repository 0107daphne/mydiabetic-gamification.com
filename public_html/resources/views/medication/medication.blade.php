@extends('layouts.app1')

@section('title', 'MyDiabetics | Medication')

@section('content')

    <div class='container-fluid'>

        <div class='row'>
            <div class='col-md-12 task-btn flex-container'>
                <div class="">
                    <a href='/medication/add' class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Medication</a>
                </div>

                <div class="">
                    <a href='/medication' class="btn btn-secondary"><i class="fas fa-file"></i>&nbsp;All Medications</a>
                </div>

                <div class="">
                    <a href='/medication/ongoing' class="btn btn-info text-light"><i class="fas fa-spinner"></i>&nbsp;On-going
                        Medications</a>
                </div>

                <div class="">
                    <a href='/medication/stopped' class="btn btn-warning text-secondary"><i
                        class="fas fa-minus-circle"></i>&nbsp;Stopped Medications</a>
                </div>
                
            </div>
        </div>
        
        <br><br>
        
        <div class="row">
            <div class='med-table col-md-12 col-sm-12 col-lg-12'>
                <div class="modal-header" style='background:#50bb7f;'>
                    <h3 class="modal-title text-center text-light">Medication Record</h3>
                </div>
                <br>
                <table class='table table-hover table-sm table-responsive x-content' id="dataTable" width="100%" cellspacing="0">
                    <thead class='thead-light'>
                        <tr>
                            <th>Medication</th>
                            <th>Date Given</th>
                            <th>Start/Stop Dates</th>
                            <th>Dosage</th>
                            <th>Form</th>
                            <th>Frequency</th>
                            <th>Directions</th>
                            <th>Reason(s) of Use</th>
                            <th>Use</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($medications as $medication)
    
                            <?php
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $startTimeStamp = strtotime(date('Y-m-d'));
                            $endTimeStamp = strtotime($medication->date_stop);
    
                            $timeDiff = $endTimeStamp - $startTimeStamp;
    
                            $numberDays = $timeDiff / 86400;
    
                            $numberDays = intval($numberDays);
                            $medication->countdown = $numberDays;
                            $medication->save();
    
                            $date = date('M d, Y', $startTimeStamp);
                            ?>
    
                            <tr>
                                <td class="med-name">{{ $medication->medication }}</td>
                                <td>{{ date('M d, Y', strtotime($medication->date_given)) }}</td>
                                <td>{{ date('d-m-y', strtotime($medication->date_start)) }} to
                                    {{ date('d-m-y', strtotime($medication->date_stop)) }}</td>
                                <td>{{ $medication->dosage }}</td>
                                <td>{{ $medication->med_form }}</td>
                                <td>{{ $medication->frequency }}</td>
                                <td>{{ $medication->directions }}</td>
                                <td>{{ $medication->reason }}</td>
                                <td>{{ $medication->use }}</td>
                                <td>
                                    @if ($medication->status == 0)
                                        On-going
                                    @elseif($medication->status==1)
                                        Stopped
                                    @endif
                                </td>
                                <td>{{ $medication->note }}</td>
                                <td class='action'>
                                    <div class='form-row'>
                                        <form action="/medication/{{ $medication->id }}/edit" method="post">
                                            @csrf
                                            <button href="" class='btn btn-info text-white btn-sm' data-toggle="tooltip"
                                                data-placement="bottom" title="Edit"><i class='fas fa-edit'></i></button>
                                        </form>
                                        &nbsp;&nbsp;&nbsp;
                                        <form action="/medication/{{ $medication->id }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class='btn btn-danger btn-sm' data-toggle="tooltip"
                                                data-placement="bottom" title="Delete"><i class='fas fa-trash-alt'></i></button>
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
