@extends('layouts.app1')

@section('title', 'MyDiabetics | Profile')

@section('content')

    <div>

        <div class="update-avatar col-lg-12 col-md-12 col-sm-12">
            <div class="modal-header" style='background:#50bb7f;'>
                <h4 class="modal-title text-center text-light">UPDATE AVATAR</h4>
                <a href="/profile" class="btn text-light" aria-label="Cancel Edit"><i class='fas fa-times'
                        style='font-size:24px'></i></a>
            </div>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/profile/{{ $users->id }}/update" method="POST" role="form" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <input id="name" type="hidden" class="form-control" name="name"
                        value="{{ old('name', auth()->user()->name) }}">
                    <label for="profile_image" class="col-md-12 col-form-label font-weight-bold text-uppercase">Profile
                        Avatar</label>
                    <div class="col-md-12">
                        @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" alt="" width="100" height="100"
                                class='rounded mx-auto d-block avatar'><br>
                        @endif
                    </div>

                    <br>
                    <div class="col-md-12">
                        <input id="profile_image" type="file" class="form-control" name="profile_image">
                        @if (auth()->user()->image)
                            <code>{{ auth()->user()->image }}</code>
                        @endif
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

@endsection
