@extends('layouts.main')

@section('content')
    <div class="page-header d-print-none">
        <div class="container">
            <div class="row g-3 align-items-center">
                @if ($errors->any())
                    <h4 class="text-danger">Terjadi Kesalahan!</h4>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif

                <div class="col">
                    <h2 class="page-title">
                        <span class="avatar me-2">AA</span>
                        {{ $user['username'] }}

                    </h2>
                    <div class="text-muted ml-3 mt-2">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">{{ $user['email'] }}</li>
                            <li class="list-inline-item">Registered {{ $dateRegis }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirm">
                            <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eraser">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" />
                                <path d="M18 13.3l-6.3 -6.3" />
                            </svg>
                            Delete User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Pre Test Score</div>
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Post Test Score</div>
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Modules Read</div>
                            <div class="h1 text-cyan">
                                3
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                <li class="nav-item">
                                    <a href="#tabs-activity" class="nav-link active h2" data-bs-toggle="tab">
                                        Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-pre-test" class="nav-link h2 " data-bs-toggle="tab">Pre
                                        Test</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tabs-post-test" class="nav-link h2" data-bs-toggle="tab">
                                        Post Test</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane  active show" id="tabs-activity">
                                    <div class="log-title mb-3">
                                        <span class="h3 mb-3">Activity History</span><br>
                                        <span class="text-muted">Showing this user activity.</span>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="divide-y">
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <span class="avatar"
                                                                    style="background-image: url(./static/avatars/010m.jpg)"></span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-truncate">
                                                                    <strong>Thatcher Keel</strong> created a profile.
                                                                </div>
                                                                <div class="text-muted">3 days ago</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <span class="avatar"
                                                                    style="background-image: url(./static/avatars/005f.jpg)"></span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-truncate">
                                                                    <strong>Dyann Escala</strong> hosted the event
                                                                    <strong>Tabler UI Birthday</strong>.
                                                                </div>
                                                                <div class="text-muted">4 days ago</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <span class="avatar"
                                                                    style="background-image: url(./static/avatars/006f.jpg)"></span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-truncate">
                                                                    <strong>Avivah Mugleston</strong> mentioned you on
                                                                    <strong>Best of 2020</strong>.
                                                                </div>
                                                                <div class="text-muted">2 days ago</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <span class="avatar">AA</span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-truncate">
                                                                    <strong>Arlie Armstead</strong> sent a Review Request to
                                                                    <strong>Amanda Blake</strong>.
                                                                </div>
                                                                <div class="text-muted">2 days ago</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-pre-test">
                                    <div class="col-12">
                                        <div class="log-title mb-3">
                                            <span class="h3 mb-3">Pre Test Log History</span><br>
                                            <span class="text-muted">Showing this user choices or answers recorded from the
                                                test.</span>

                                            <div class="col-md-auto ms-auto d-print-none mt-2">
                                                <div class="btn-list">
                                                    <a href="#" class="btn btn-danger">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eraser">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" />
                                                            <path d="M18 13.3l-6.3 -6.3" />
                                                        </svg>
                                                        Reset Test
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Question</th>
                                                            <th>Users Answers</th>
                                                            <th>Point</th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Apa itu plastik?</td>
                                                            <td>
                                                                <span class="h2 text-red">
                                                                    B
                                                                </span>
                                                            </td>
                                                            <td>0</td>
                                                            <td class="text-center">
                                                                <div class="p-2 bg-red-lt"
                                                                    style="width: 50px; border-radius:10px;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M18 6l-12 12" />
                                                                        <path d="M6 6l12 12" />
                                                                    </svg>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Terbuat dari apa plastik?</td>
                                                            <td>
                                                                <span class="h2 text-teal">
                                                                    A
                                                                </span>
                                                            </td>
                                                            <td>20</td>
                                                            <td class="text-center">
                                                                <div class="p-2 bg-green-lt"
                                                                    style="width: 50px; border-radius:10px;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M5 12l5 5l10 -10" />
                                                                    </svg>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-post-test">
                                    <div class="col-12">
                                        <div class="log-title mb-3">
                                            <span class="h3 mb-3">Post Test Log History</span><br>
                                            <span class="text-muted">Showing this user choices or answers recorded from the
                                                test.</span>

                                            <div class="col-md-auto ms-auto d-print-none mt-2">
                                                <div class="btn-list">
                                                    <a href="#" class="btn btn-danger">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eraser">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" />
                                                            <path d="M18 13.3l-6.3 -6.3" />
                                                        </svg>
                                                        Reset Test
                                                    </a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Question</th>
                                                            <th>Users Answers</th>
                                                            <th>Point</th>
                                                            <th>Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Apa itu plastik?</td>
                                                            <td>
                                                                <span class="h2 text-red">
                                                                    B
                                                                </span>
                                                            </td>
                                                            <td>0</td>
                                                            <td class="text-center">
                                                                <div class="p-2 bg-red-lt"
                                                                    style="width: 50px; border-radius:10px;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M18 6l-12 12" />
                                                                        <path d="M6 6l12 12" />
                                                                    </svg>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Terbuat dari apa plastik?</td>
                                                            <td>
                                                                <span class="h2 text-teal">
                                                                    A
                                                                </span>
                                                            </td>
                                                            <td>20</td>
                                                            <td class="text-center">
                                                                <div class="p-2 bg-green-lt"
                                                                    style="width: 50px; border-radius:10px;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-check">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M5 12l5 5l10 -10" />
                                                                    </svg>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                        <path d="M12 9v4" />
                        <path d="M12 17h.01" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to delete this user?</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col">
                                <a href="{{ route('deleteUser', ['id' => $user['id']]) }}" class="btn btn-danger w-100">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
