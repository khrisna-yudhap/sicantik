@extends('layouts.main')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Users Management
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col text-start">
                    <button class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#register-user-modal">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </span>
                        Add New User
                    </button>
                </div>


                <div class="alert alert-success mt-3" id="alertSuccess" style="display: none;" role="alert">
                    User registered successfully. Reloading Data...
                </div>
                <div class="col-12">
                    <div class="card p-3">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table" id="users-table">
                                <thead>
                                    <tr>
                                        <th>User Data</th>
                                        <th>Role</th>
                                        <th>Pre Test Score</th>
                                        <th class="text-start">Post Test Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td data-label="Name">
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2">{{ $user['username'][0] }}</span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $user['username'] }}</div>
                                                        <div class="text-muted">
                                                            <a href="#" class="text-reset">{{ $user['email'] }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-muted" data-label="Role">
                                                @if ($user['level'] != 0)
                                                    Administrator
                                                @else
                                                    User
                                                @endif
                                            </td>
                                            <td class="text-start">
                                                @if ($user['pre_score'] > 75)
                                                    <div class="h1 mb-0 text-teal">
                                                        {{ $user['pre_score'] }}
                                                    </div>
                                                @elseif ($user['pre_score'] == null)
                                                    <div class="h1 mb-0 text-red">
                                                        -
                                                    </div>
                                                @elseif($user['pre_score'] < 75)
                                                    <div class="h1 mb-0 text-red">
                                                        {{ $user['pre_score'] }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="text-start">
                                                @if ($user['post_score'] > 75)
                                                    <div class="h1 mb-0 text-teal">
                                                        {{ $user['post_score'] }}
                                                    </div>
                                                @elseif ($user['post_score'] == null)
                                                    <div class="h1 mb-0 text-red">
                                                        -
                                                    </div>
                                                @elseif($user['post_score'] < 75)
                                                    <div class="h1 mb-0 text-red">
                                                        {{ $user['post_score'] }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('detailUser', ['id' => $user['id']]) }}"
                                                        class="btn bg-cyan-lt">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                        Details
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="register-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" id="registerUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger" id="errorMsg" style="display: none">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="John Doe" />
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="john@youremail.com">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="pw"
                                placeholder="Password">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="pwconf" placeholder="Password">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="addFakultasBtn" class="btn btn-teal">Register</button>
                    </div>
                </form>

                <div class="progress" id="progressBar" style="display: none;">
                    <div class="progress-bar progress-bar-indeterminate bg-teal"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').DataTable({

                layout: {
                    topEnd: {
                        search: {
                            placeholder: 'Type search here'
                        }
                    },
                }
            });

        });

        $("#registerUserForm").on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $("#progressBar").removeAttr("style");

            $.ajax({
                url: "{{ route('users.store') }}",
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    $('#register-user-modal').modal('toggle');
                    $("#alertSuccess").removeAttr("style");

                    setTimeout(function() {
                        location.reload();
                    }, 300);
                },
                error: function(xhr) {
                    // Handle error response
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        // Display errors in the UI, for example, in a div with id 'error-messages

                        $.each(errors, function(key, value) {
                            $("#progressBar").css("display", "none");
                            $('#errorMsg').removeAttr("style");
                            $('#errorMsg').append('<p>' + value + '</p>');
                        });
                    } else {
                        // Handle other error cases
                        console.error('Unexpected error occurred.');
                    }
                }


            });

        });
    </script>
@endpush
