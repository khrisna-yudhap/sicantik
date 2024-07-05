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
                        Pre Test | Post Test Management
                    </h2>
                </div>

            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12 text-start">
                    <button class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#add-new-question">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </span>
                        Add New Question
                    </button>

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
                            <table class="table table-vcenter card-table" id="questions-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th width="50%">Question</th>
                                        <th class="text-center">Answers</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($questions as $q)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                            <td>
                                                {{ $q['question'] }}
                                            </td>
                                            @if ($q['pos'] == 0)
                                                <td class="text-center">{!! $q['answer_key'] == null
                                                    ? "<span class='h3 m-0 text-red'>Answer not set!</span>"
                                                    : '<span class="h3 m-0 text-teal">A </span>' !!}
                                                </td>
                                            @elseif($q['pos'] == 1)
                                                <td class="text-center">{!! $q['answer_key'] == null
                                                    ? "<span class='h3 m-0 text-red'>Answer not set!</span>"
                                                    : '<span class="h3 m-0 text-teal">B </span> ' !!}
                                                </td>
                                            @elseif($q['pos'] == 2)
                                                <td class="text-center">{!! $q['answer_key'] == null
                                                    ? "<span class='h3 m-0 text-red'>Answer not set!</span>"
                                                    : '<span class="h3 m-0 text-teal">C </span> ' !!}
                                                </td>
                                            @elseif($q['pos'] == 3)
                                                <td class="text-center">{!! $q['answer_key'] == null
                                                    ? "<span class='h3 m-0 text-red'>Answer not set!</span>"
                                                    : '<span class="h3 m-0 text-teal">D </span> ' !!}
                                                </td>
                                            @endif

                                            <td>
                                                <div class="btn-list flex-nowrap">
                                                    <a href="{{ route('questions.setting', ['id' => $q['id']]) }}"
                                                        class="btn bg-orange-lt text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                            <path d="M13.5 6.5l4 4" />
                                                        </svg>
                                                        Manage Answers
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

    <div class="modal modal-blur fade" id="add-new-question" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Create New Test Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <form action="#" method="POST" id="addNewQuestionForm">
                        @csrf
                        <div class="card-body">
                            <div class="alert alert-danger" id="errorMsg" style="display: none">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Question</label>
                                <div>
                                    <input type="text" class="form-control" placeholder="Enter Question"
                                        name="question" />
                                    <small class="form-hint">This question will show in pre test and post test in the mobile
                                        app.</small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col">
                                    Pertanyaan Sudah Benar? Jika sudah tekan <a class="text-teal" href="#">Save</a>
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
            $('#questions-table').DataTable({
                ordering: [1],
                layout: {
                    topEnd: {
                        search: {
                            placeholder: 'Type search here'
                        }
                    },
                }
            });

        });

        $("#addNewQuestionForm").on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $("#progressBar").removeAttr("style");

            $.ajax({
                url: "{{ route('questions.store') }}",
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
                    $('#add-new-question').modal('toggle');
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
