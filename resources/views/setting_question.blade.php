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
                        Manage Question Answers
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Question</div>
                            <div class="h1 mb-0 text-teal">
                                {{ $question['question'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Answer Key</div>
                            <div class="h2 mb-0 text-teal">
                                @if ($question['answer_key'] != null)
                                    @if ($answer_key->pos == 0)
                                        Answer A
                                    @elseif($answer_key->pos == 1)
                                        Answer B
                                    @elseif($answer_key->pos == 2)
                                        Answer C
                                    @elseif($answer_key->pos == 3)
                                        Answer D
                                    @endif
                                @else
                                    <small class="text-red">Not set</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="subheader">Point</div>
                            <div class="h2 mb-0 text-teal">
                                {{ $question['point'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="ribbon bg-teal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-key">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                                <path d="M15 9h.01" />
                            </svg>

                        </div>
                        <div class="card-body">
                            <h3 class="card-title mb-2">Set Answer Key</h3>
                            <p class="card-subtitle">
                                Please choose correct answer for the question from answers list below.
                            </p>

                            <form action="{{ route('questions.set_key', ['id' => $question['id']]) }}">
                                @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <select type="text" class="form-select" id="select-answer" name="answer_id">
                                                @if ($answers->isempty())
                                                    <option value="#">
                                                        Empty List | Please add answers list first below.
                                                    </option>
                                                @else
                                                    <option selected>Select Answer Key</option>
                                                    @foreach ($answers as $answer)
                                                        <option value="{{ $answer['id'] }}"
                                                            {{ $answer_key != null ? ($answer_key->id == $answer['id'] ? 'selected' : '') : '' }}>
                                                            {{ $answer['answer'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-teal"> Save Answer Key</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="ribbon bg-cyan">
                            Answers
                        </div>
                        <form action="{{ $answers->isEmpty() ? route('answers.store') : route('answers.update') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" value="{{ $question['id'] }}" name="question_id">
                            <div class="card-body">
                                <h2 class="card-title mb-2">Answers List</h2>
                                <p class="card-subtitle">
                                    Create answers for the question.
                                </p>

                                <div class="mb-3">
                                    <label class="form-label required">Answers A</label>
                                    <div>
                                        @if ($answers->isEmpty())
                                            <input type="text" class="form-control" placeholder="Enter Answer A"
                                                name="answer_a" />
                                        @else
                                            <input type="hidden" name="answer_id_a" value="{{ $answers[0]->id }}">
                                            <input type="text" class="form-control" placeholder="Enter Answer A"
                                                name="answer_a" value="{{ $answers[0]->answer }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Answers B</label>
                                    <div>
                                        @if ($answers->isEmpty())
                                            <input type="text" class="form-control" placeholder="Enter Answer B"
                                                name="answer_b" />
                                        @else
                                            <input type="hidden" name="answer_id_b" value="{{ $answers[1]->id }}">
                                            <input type="text" class="form-control" placeholder="Enter Answer B"
                                                name="answer_b" value="{{ $answers[1]->answer }}" />
                                        @endif

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Answers C</label>
                                    <div>
                                        @if ($answers->isEmpty())
                                            <input type="text" class="form-control" placeholder="Enter Answer C"
                                                name="answer_c" />
                                        @else
                                            <input type="hidden" name="answer_id_c" value="{{ $answers[2]->id }}">
                                            <input type="text" class="form-control" placeholder="Enter Answer C"
                                                name="answer_c" value="{{ $answers[2]->answer }}" />
                                        @endif

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Answers D</label>
                                    <div>
                                        @if ($answers->isEmpty())
                                            <input type="text" class="form-control" placeholder="Enter Answer D"
                                                name="answer_d" />
                                        @else
                                            <input type="hidden" name="answer_id_d" value="{{ $answers[3]->id }}">
                                            <input type="text" class="form-control" placeholder="Enter Answer D"
                                                name="answer_d" value="{{ $answers[3]->answer }}" />
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-2">
                                <div class="row align-items-center">
                                    <div class="col"><span></span></div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-cyan"> Update Answers List</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
