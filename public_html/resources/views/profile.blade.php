@extends('layouts.app4')

@section('title', 'MyDiabetics | Profile')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 profile profile1 bg-white x-content">
                @foreach ($users as $user)
                    <a href="/profile/{{ $user->id }}/avatar" class="btn btn-light flex-left" data-toggle="tooltip"
                        data-placement="bottom" title="Change avatar"><i class="fas fa-camera"></i></a><br>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" alt="" width="200" height="200"
                                class='rounded-circle mx-auto d-block avatar'><br>
                        @endif
                    </div>
                    <hr>
                    <h5><span data-toggle="tooltip" data-placement="top" title="Earn badges by completing appointments!"><i
                                class="far fa-question-circle"></i></span> &nbsp;Achievement(s):</h5><br>
                    {{-- {{ cal_days_in_month(CAL_GREGORIAN, 8, 2020) }}
                    --}} {{-- display last day of the month
                    --}}
                    {{--
                    {{ DateTime::createFromFormat('Y-m-d', '2020-08-20')->format('Y-m-t') }}
                    --}} {{-- get the last date of the month
                    --}}
                    {{-- {{ cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y')) }}
                    --}}
                    {{-- {{ date('n') }} --}}

                    @if ($user->badge_status == 0)
                        <p class="text-monospace notice">You haven't earned any badge yet.</p>
                    @else
                        @foreach ($achievement_badges as $badge)
                            <img src="{{ asset('storage/app/public/badges/' . $badge->badge_icon) }}" alt="{{ $badge->badge_name }}"
                                title="{{ $badge->badge_name }}" width="50" height="50">
                        @endforeach

                    @endif
                @endforeach

                <hr>
                <a href="/profile/{{ $user->id }}/edit" class="btn btn-light float-right" data-toggle="tooltip"
                    data-placement="bottom" title="Edit Personal Information"><i class="far fa-edit"></i></a>
                <div class="tabbed">
                    <input type="radio" name="tabs" id="tab_one" checked>
                    <label for="tab_one"><strong>Basic Info</strong></label>

                    <input type="radio" name="tabs" id="tab_two">
                    <label for="tab_two"><strong>Emergency Contact</strong></label>

                    <input type="radio" name="tabs" id="tab_three">
                    <label for="tab_three"><strong>Medical Info</strong></label>
                    @foreach ($users as $user)
                        <div class="tabs">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Name</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Phone No</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->phone_no }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Email</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Date of Birth</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ date('F j, Y', strtotime($user->date_of_birth)) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Name</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->emergency_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Relationship</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->emergency_relation }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Phone No</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->emergency_phone }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 table-responsive x-content">
                                <br>

                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Physician</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->physician_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                        <p class="{{-- float-right  --}}content-type">Phone No</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7">
                                        <p class="content-type1">{{ $user->physician_phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <th>Allergies</th>
                                            <td class="text-justify">{{ $user->allergies }}</td>
                                        </tr>
                                        <tr>
                                            <th>Medical Condition</th>
                                            <td class="text-justify">{{ $user->medical_condition }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div> {{-- END OF PROFILE --}}

            <div class="col-lg-6 col-md-6 col-sm-6 profile profile3 bg-white">
                <div class="row {{-- mission --}}">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-dark text-center mission1">
                        <h2 class='text-center mis1'>Missions</h2>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="progress mission2">
                            <div class="progress-bar text-dark active"
                                style="width:{{ intval($completed_mission) }}%; background:rgb(139, 253, 191);">
                                <strong>&nbsp;{{ intval($completed_mission) }}%</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row mission3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <form action="/profile" method="POST" id="missionForm" class="mission-form">
                            @csrf
                            <div class="form-row">
                                <div class="input-group row">
                                    <div class="col-sm-11 col-md-11 col-lg-11">
                                        <div class="input-group-prepend add-mission-form">
                                            <div class="input-group-text"><i class="fas fa-flag-checkered"></i></div>
                                            <input type="text" class="form-control @error('mission') is-invalid @enderror"
                                                name="mission" required placeholder="Add your mission">
                                            @error('mission')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-md-1 col-lg-1">
                                        <button type="submit" class="add-mission-btn" id="addMission"><i
                                                class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <br>

                        <div class="form-row mission-box">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <table class="table table-sm table-borderless table-striped " id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="bg-success">
                                        <tr>
                                            <th class="text-light">Missions</th>
                                            <th class="text-light mission-action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($missions as $mission)
                                            <tr>
                                                <td>
                                                    {{-- <div class="row">
                                                        <div class="col-md-10 col-sm-10 col-lg-10">
                                                            <form action="/profile/{{ $mission->id }}" method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="inputGroup">
                                                                    <label for="completed{{ $mission->id }}"
                                                                        class='checkbox {{ $mission->completed ? 'is-complete1' : '' }}'>
                                                                        <input type="checkbox" class="mission-checkbox"
                                                                            id="completed{{ $mission->id }}"
                                                                            name="completed" onchange="this.form.submit()"
                                                                            {{ $mission->completed ? 'checked' : '' }}>
                                                                        &nbsp;
                                                                        <span
                                                                            class="mission-input">{{ $mission->mission }}</span>
                                                                    </label>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="col-md-2">
                                                            <form action="/profile/{{ $mission->id }}" method="post"
                                                                onclick="return checkDelete()">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class='del-mission float-right'
                                                                    data-toggle="tooltip" data-placement="bottom"><i class='fas fa-trash-alt'></i></button>
                                                            </form>
                                                        </div>
                                                    </div> --}}
                                                    <form action="/profile/{{ $mission->id }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        {{-- <div class="inputGroup"> --}}
                                                            <label for="completed{{ $mission->id }}"
                                                                class='checkbox {{ $mission->completed ? 'is-complete1' : '' }}'>
                                                                <input type="checkbox" class="mission-checkbox"
                                                                    id="completed{{ $mission->id }}"
                                                                    name="completed" onchange="this.form.submit()"
                                                                    {{ $mission->completed ? 'checked' : '' }}>
                                                                &nbsp;
                                                                <span
                                                                    class="mission-input">{{ $mission->mission }}</span>
                                                            </label>
                                                        {{-- </div> --}}
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="/profile/{{ $mission->id }}" method="post"
                                                        onclick="return checkDelete()">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class='del-mission float-right {{-- btn btn-sm btn-danger --}}'
                                                            data-toggle="tooltip" data-placement="bottom"><i class='fas fa-trash-alt'></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div> {{-- END OF ROW --}}

            </div> {{-- END OF CONTAINER FLUID --}}
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
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }

    </script>

@endsection
