@extends('layouts.app1')

@section('title', 'MyDiabetics | Task')

@section('content')

    <div class='container-fluid'>

        <div class='row'>
            <div class='col-md-10 task-btn flex-container'>
                <div class="">
                    <a href='/task/add' class="btn btn-success"><i class="fas fa-plus"></i>&nbsp;Add Task</a>
                </div>

                <div class="">
                    <a href='/task' class="btn btn-secondary"><i class="fas fa-file"></i>&nbsp;All Tasks</a>
                </div>

                <div class="">
                    <a href='/task/completed' class="btn btn-info text-light"><i class="fas fa-check-square"></i>&nbsp;Completed
                        Tasks</a>
                </div>

                <div class="">
                    <a href='/task/overdue' class="btn btn-warning text-secondary"><i
                        class="fas fa-exclamation-circle"></i>&nbsp;Overdue Tasks</a>
                </div>
                
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class='task-table table-responsive x-content col-md-10 col-sm-10 col-lg-10'>

                <div class="modal-header" style='background:#50bb7f;'>
                    <h4 class="modal-title text-center text-light">List of Tasks</h4>
                </div>
                <br>
                <table class='table table-hover table-sm {{-- table-responsive x-content --}}' id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Task Name</th>
                            <th>Deadline</th>
                            <th class="text-center">Completion Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td class='text-center'>
                                @if ($task->completed == 0)
                                    <span class='text-danger'>Incomplete</span>
                                @else
                                    <span class="text-success">Completed</span>
                                @endif
                            </td>
                            <td class='action text-center d-flex justify-content-center'>
                                <div class='form-row'>
                                    <form action="/task/{{ $task->id }}/edit" method="post">
                                        @csrf
                                        <button href="" class='btn btn-info text-white btn-sm' data-toggle="tooltip"
                                            data-placement="bottom" title="Edit"><i class='fas fa-edit'></i></button>
                                    </form>
                                    &nbsp;&nbsp;&nbsp;
                                    <form action="/task/{{ $task->id }}" method="post" onclick="return checkDelete()">
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
        document.getElementsByName("deadline")[0].setAttribute('min', today);

    </script>
@endsection
