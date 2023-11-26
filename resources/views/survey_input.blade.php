<x-layout-bs headeroff="true">
    <style>
        html,
        body {
            height: 100%;
        }

        .form-signin {
            max-width: 630px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
    </style>

    <main class="form-signin w-100 m-auto">
        <livewire:Input :survey=$survey>
        <form method="post" action={{ url('word-create') }}>
            @csrf
            <input type="hidden" name="survey_id" value="{{ $survey->id }}">
            <input type="hidden" name="survey_external_id" value="{{ $survey->external_id }}">
            <input type="hidden" name="user_id" value="{{ $user_id }}">

            @if ($enabled)
                @if ($survey->type == 'word')
                    <div class="form-floating">
                        <input class="form-control" id="floatingInput" type="text" name="word"
                            placeholder="Antwort">
                        <label for="floatingInput">Deine Antwort:</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Abschicken</button>
                @endif

                @if ($survey->type == 'multiple-choice' or $survey->type == 'feedback')
                    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
                        <div class="d-grid gap-2">
                            @foreach ($survey->answers as $answer)
                                @isset($answer)
                                    <button class="btn btn-primary rounded-pill" name="word" type="submit"
                                        value="{{ $answer }}">{{ $answer }}</button>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                    <h1>Danke für deine Antwort!</h1>
            @endif

        </form>
    </main>
</x-layout-bs>
