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
                        Modules Management
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
                    <button class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#add-new-module">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </span>
                        Add New Modules
                    </button>
                    <a href="{{ route('modules.print') }}" class="btn btn-warning" target=”_blank”>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" style="margin: 0;" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>

                        </span>
                        Print QR Code
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-12">
                    <div class="card p-3">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table" id="modules-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Module Thumbnail</th>
                                        <th width="40%">Module Title</th>
                                        <th class="text-center">QRCode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modules as $module)
                                        <?php
                                        $qr_link = $module['qr_link'];
                                        if ($qr_link == null) {
                                            $qr_link = url('/qr-not-found');
                                        }
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ url('storage/app/public/thumbnail/' . $module['thumbnail']) }}"
                                                    alt="{{ $module['thumbnail'] }}"
                                                    style="max-width: 150px;
                                                    max-height: 150px;">
                                            </td>
                                            <td>{{ $module['title'] }}</td>
                                            <td>
                                                <div class="visible-print text-center">
                                                    {!! QrCode::size(100)->generate($qr_link) !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a target="_blank"
                                                        href="{{ route('modules.view', ['id' => $module['id']]) }}"
                                                        class="btn bg-cyan-lt text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            style="margin: 0;" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>

                                                    <a href="{{ route('modules.delete', ['id' => $module['id']]) }}"
                                                        class="btn bg-red-lt text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            style="margin: 0;" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7h16" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            <path d="M10 12l4 4m0 -4l-4 4" />
                                                        </svg>
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

    <div class="modal modal-blur fade" id="add-new-module" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Create New Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <form action="#" method="POST" id="addNewModuleForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="alert alert-danger" id="errorMsg" style="display: none">
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Module Thumbnail</div>
                                <input type="file" class="form-control" name="thumbnail" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Module Title</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Enter Module Title"
                                        name="title" />
                                    <small class="form-hint">Module title will shows in the mobile app.</small>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label required">Module File Content (PDF)</div>
                                <input type="file" name="module_content" class="form-control" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col">
                                    File module sudah benar? Jika sudah tekan <a class="text-teal" href="#">Save</a>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" href="#" class="btn btn-teal"> Save </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
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
            $('#modules-table').DataTable({

                layout: {
                    topEnd: {
                        search: {
                            placeholder: 'Type search here'
                        }
                    },
                }
            });

        });

        $("#addNewModuleForm").on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $("#progressBar").removeAttr("style");

            $.ajax({
                url: "{{ route('modules.store') }}",
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
                    $('#add-new-module').modal('toggle');
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
