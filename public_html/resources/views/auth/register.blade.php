@extends('layouts.app3')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center box effect">
                <div class="col-lg-4 col-md-4 col-sm-4 form-box">
                    <img src="{{ asset('img/dlogo-1.png') }}" alt="" width="100" height="100" class="mx-auto d-block">
                    <h4 class="text-center">Create your free account today</h4>
                    <h1 class="text-center logotitle">MyDiabetic</h1>

                    <p class="text-center">Already have an account?</p>
                    <div class='signup'>
                        <a href="{{ route('login') }}" class="mx-auto d-block text-center">Sign In</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 form-box1">
                    <h1 class="text-center">Sign Up</h1>

                    <form method="POST" action="{{ route('register') }}" class="reg-form">
                        @csrf
                        <div class="form-sections">
                            <h3>Basic Info</h3>

                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="What's your name?">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="date_of_birth" class="col-md-4 col-form-label">{{ __('Date of Birth') }}</label>

                            <div class="col-md-10">
                                <input id="date_of_birth" type="date"
                                    class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="phone_no" class="col-md-4 col-form-label">{{ __('Phone No') }}</label>

                            <div class="col-md-10">
                                <input id="phone_no" type="text"
                                    class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                    value="{{ old('phone_no') }}" required autocomplete="phone_no"
                                    placeholder="Type your phone number here">

                                @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sections">
                            <h3>Emergency Contact Info</h3>

                            <label for="emergency_name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-10">
                                <input id="emergency_name" type="text"
                                    class="form-control @error('emergency_name') is-invalid @enderror" name="emergency_name"
                                    value="{{ old('emergency_name') }}" required autocomplete="emergency_name"
                                    placeholder="Who do you want to be your emergency contact?">

                                @error('emergency_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="emergency_relation" class="col-md-4 col-form-label">{{ __('Relationship') }}</label>

                            <div class="col-md-10">
                                <input id="emergency_relation" type="text"
                                    class="form-control @error('emergency_relation') is-invalid @enderror"
                                    name="emergency_relation" value="{{ old('emergency_relation') }}" required
                                    autocomplete="emergency_relation"
                                    placeholder="What is your relationship with this person?">

                                @error('emergency_relation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="emergency_phone" class="col-md-4 col-form-label">{{ __('Contact No') }}</label>

                            <div class="col-md-10">
                                <input id="emergency_phone" type="text"
                                    class="form-control @error('emergency_phone') is-invalid @enderror"
                                    name="emergency_phone" value="{{ old('emergency_phone') }}" required
                                    autocomplete="emergency_phone"
                                    placeholder="Type your emergency contact phone number here">

                                @error('emergency_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sections">
                            <h3>Medical Info</h3>

                            <label for="physician_name" class="col-md-4 col-form-label">{{ __('Physician Name') }}</label>

                            <div class="col-md-10">
                                <input id="physician_name" type="text"
                                    class="form-control @error('physician_name') is-invalid @enderror" name="physician_name"
                                    value="{{ old('physician_name') }}" required autocomplete="physician_name"
                                    placeholder="Who is your physician?">

                                @error('physician_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="physician_phone"
                                class="col-md-4 col-form-label">{{ __('Physician Phone No') }}</label>

                            <div class="col-md-10">
                                <input id="physician_phone" type="text"
                                    class="form-control @error('physician_phone') is-invalid @enderror"
                                    name="physician_phone" value="{{ old('physician_phone') }}" required
                                    autocomplete="physician_phone" placeholder="Type your physician's contact number here">

                                @error('physician_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="allergies" class="col-md-4 col-form-label">{{ __('Allergies') }}</label>

                            <div class="col-md-10">
                                <textarea id="allergies" type="text"
                                    class="form-control @error('allergies') is-invalid @enderror" name="allergies"
                                    value="{{ old('allergies') }}" required autocomplete="allergies"
                                    placeholder="List down your allergies here"></textarea>

                                @error('allergies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="medical_condition"
                                class="col-md-4 col-form-label">{{ __('Medical Condition') }}</label>

                            <div class="col-md-10">
                                <textarea id="medical_condition" type="text"
                                    class="form-control @error('medical_condition') is-invalid @enderror"
                                    name="medical_condition" value="{{ old('medical_condition') }}" required
                                    autocomplete="medical_condition"
                                    placeholder="List down your medical conditions here"></textarea>

                                @error('medical_condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-sections">
                            <h3>Login Info</h3>

                            <label for="email" class="col-md-4 col-form-label">{{ __('E-mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Type your email here">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password"
                                    placeholder="Type your password here(must be at least 8 characters)">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="password-confirm"
                                class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Re-type your password for confirmation">
                            </div>
                        </div>
                        <br>
                        <div class="form-navigations">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="previous">Previous</button>
                                    <button class="next">Next</button>
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="signup-btn">
                                        {{ __('Sign Up') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous"></script>

    <script>
        $(function() {
            var $sections = $('.form-sections');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigations .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigations .next').toggle(!atTheEnd);
                $('.form-navigations [type=submit]').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigations .previous').click(function() {
                navigateTo(curIndex() - 1);
            });

            $('.form-navigations .next').click(function() {
                $('.reg-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });

            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);

        });

    </script>


@endsection
