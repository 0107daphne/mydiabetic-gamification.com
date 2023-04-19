@extends('layouts.app1')

@section('title', 'MyDiabetics | Profile')

@section('content')

    {{-- <a href="#create" class="btn btn-success" data-toggle="collapse">Edit medication
        record</a> --}}


    <div>


        <div class="edit-prof col-lg-12">
            <div class="modal-header" style='background:#50bb7f;'>
                <h4 class="modal-title text-center text-light">EDIT PROFILE</h4>
                <a href="/profile" class="btn text-light" aria-label="Cancel Edit"><i class='fas fa-times'
                        style='font-size:24px'></i></a>
            </div>
            <br>
            <form action="/profile/{{ $users->id }}" method="POST">
                {{-- @method('PATCH') --}}
                @csrf
                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="name" class='form-lbl'>Name</label>
                        <input type="text" class='form-control' required name="name" value="{{ $users->name }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="email" class='form-lbl'>Email</label>
                        <input type="email" class='form-control' name="email" value="{{ $users->email }}" disabled>
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="date_of_birth" class='form-lbl'>Date of Birth</label>
                        <input type="date" class='form-control' required name="date_of_birth" id="date_of_birth"
                            value="{{ $users->date_of_birth }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="phone_no" class='form-lbl'>Phone No</label>
                        <input type="text" class='form-control' required name="phone_no" id="phone_no"
                            value="{{ $users->phone_no }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="emergency_name" class='form-lbl'>Emergency Contact Name</label>
                        <input type="text" class='form-control' required name="emergency_name" id="emergency_name"
                            value="{{ $users->emergency_name }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="emergency_relation" class='form-lbl'>Emergency Contact Relationship</label>
                        <input type="text" class='form-control' required name="emergency_relation" id="emergency_relation"
                            value="{{ $users->emergency_relation }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="emergency_phone" class='form-lbl'>Emergency Contact No</label>
                        <input type="text" class='form-control' required name="emergency_phone" id="emergency_phone"
                            value="{{ $users->emergency_phone }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="physician_name" class='form-lbl'>Physician Name</label>
                        <input type="text" class='form-control' required name="physician_name" id="physician_name"
                            value="{{ $users->physician_name }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="physician_phone" class='form-lbl'>Physician Phone</label>
                        <input type="text" class='form-control' required name="physician_phone" id="physician_phone"
                            value="{{ $users->physician_phone }}">
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="allergies" class='form-lbl'>Allergies</label>
                        <textarea name="allergies" id="allergies" rows="10"
                            class='form-control'>{{ $users->allergies }}</textarea>
                    </div>
                </div>

                <div class='form-row'>
                    <div class="form-group col-md-12">
                        <label for="medical_condition" class='form-lbl'>Medical Condition</label>
                        <textarea name="medical_condition" id="medical_condition" rows="10"
                            class='form-control'>{{ $users->medical_condition }}</textarea>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
                <a class="btn btn-danger" href='/profile'>Cancel</a>
            </form>
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
