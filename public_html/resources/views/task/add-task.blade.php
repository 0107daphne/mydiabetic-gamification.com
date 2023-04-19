@extends('layouts.app1')

@section('title', 'MyDiabetics | Task')

@section('content')


    <div class='container'>
        <div class="create-task col-lg-12">
            <div class="modal-header" style='background:mediumseagreen;'>
                <h4 class="modal-title text-center" style='color:white;'>ADD TASK</h4>
                <a href="/task" class="btn" style=" color:white;" aria-label="Cancel Edit"><i class='fas fa-times'
                        style='font-size:24px'></i></a>
            </div>
            <br>
            <form action="/task" method="POST">

                @csrf
                
               {{--  <input type="hidden" name="user_id"> --}}
                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="task_name" class='form-lbl'>Name of Task</label>
                        <input type="text" class='form-control @error('task_name') is-invalid @enderror' placeholder="Name of Task" required name="task_name" value = "{{old('task_name')}}">
                        @error('task_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="deadline" class='form-lbl'>Deadline</label>
                        <input type="date" class='form-control @error('deadline') is-invalid @enderror' required name="deadline" id="deadline">
                    </div>
                    @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Create</button>
                <a class="btn btn-danger" href='/task'>Cancel</a>

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
