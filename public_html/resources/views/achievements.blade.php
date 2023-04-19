@extends('layouts.app1')

@section('title', 'MyDiabetics | Achievements')

@section('content')

    <div class="container-fluid">

        <div class="create-task col-lg-12">
            <div class="modal-header">
                <h4 class="modal-title text-center text-dark">ACHIEVEMENTS</h4>
            </div>
            <br>
            <table class="table table-hover">
                <thead class="thead-light">
                    <th>Badge</th>
                    <th>Badge Name</th>
                    <th>Badge Description</th>
                </thead>
                {{-- <tbody>
                    @foreach ($badges as $badge)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $badge->badge_icon) }}" alt="" title="" width="50"
                                    height="50">
                            </td>
                            <th>{{ $badge->badge_name }}</th>
                            <td>
                                {{ $badge->badge_desc }}
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
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
