<div>
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

        @if ($survey->time > 0 and $survey->enabled == 1)
            <div>
                <label for="customRange1" class="form-label">Zeit übrig: {{ $survey->time_left }}</label>
                <input type="range" class="form-range" id="customRange1" disabled min=0 max="{{ $survey->time }}"
                    value="{{ $survey->time_left }}">
            </div>
        @endif


        @if ($survey->enabled == 1)
            @if ($survey->type == 'wordcloud')
                <form wire:submit="save">
                    <div class="form-floating">
                        <input class="form-control" id="floatingInput" type="text" name="answer"
                            placeholder="Antwort" wire:model="answer">
                        <label for="floatingInput">Deine Antwort:</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Abschicken</button>
                </form>
            @endif

            @if ($survey->type == 'multiple-choice' or $survey->type == 'feedback')
                <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
                    <div class="d-grid gap-2">
                        @foreach ($survey->answers as $answer)
                            @isset($answer)
                                <button class="btn btn-primary rounded-pill" name="word"
                                    wire:click="save('{{ $answer }}')">{{ $answer }}</button>
                            @endisset
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <div>
                <h2>Die Umfrage ist beendet.</h2>
                <h1>Danke für die Teilnahme!</h1>
            </div>
        @endif


    </main>


    @if ($survey->enabled == 1)
        <div wire:poll.1s>
        </div>
    @endif


    <!-- TODO:Remove this
    <div>
        <ul>
            <li>ext id {{ $survey->external_id }}</li>
            <li>frage {{ $survey->question }}</li>
            <li>aktuelle zeit {{ time() }}</li>
            <li>start zeit {{ $survey->start }}</li>
            <li>zeit limit {{ $survey->time }}</li>
            <li>zeit übrig (berechnet) {{ $survey->time_left }}</li>
            <li>antworten gesamt {{ $survey->answers_all_count }}</li>
            <li>antworten meine {{ $survey->answers_user_count }}</li>
            <li>user {{ $survey->user_count }}</li>
            <li>DB::getQueryLog </li>
        </ul>
        <button wire:click="$refresh">Refresh page!</button>
    </div>
    -->
</div>
