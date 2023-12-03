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
        
        @if ( $survey->time > 0 and $survey->enabled) 
        <label for="customRange1" class="form-label">Zeit übrig: {{ $survey->time_left }}</label>
        <input type="range" class="form-range" id="customRange1" disabled min=0 max="{{ $survey->time}}" value="{{ $survey->time_left}}">
        @endif
        <form wire:submit="save">
            @if ($survey->enabled)
                @if ($survey->type == 'wordcloud')
                    <div class="form-floating">
                        <input class="form-control" id="floatingInput" type="text" name="answer" placeholder="Antwort"
                            wire:model="answer">
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





    <div>
        {{-- Success is as dangerous as failure. --}}
            <ul>
                <li>ext id {{ $survey->external_id }}</li>
                <li>frage {{ $survey->question }}</li>
                <li>aktuelle zeit {{ time() }}</li>
                <li>start zeit {{ $survey->start }}</li>
                <li>zeit limit {{ $survey->time }}</li>
                <li>zeit übrig (berechnet) {{ $survey->time_left }}</li>
                <li>aktiv (berechnet) @if ($survey->enabled) AKTIV @else OFF @endif</li>
                <li>antworten gesamt {{ $survey->answers_all_count }}</li>
                <li>antworten meine {{ $survey->answers_user_count }}</li>
                <li>antworten andere {{ $survey->user_count }}</li>
                <li>DB::getQueryLog </li>
            </ul>

        @if ($survey->enabled == 1)
            <div wire:poll.1s>
                <h1>Survey is active!</h1>
            </div>
        @else
            <div>
                <h1>Survey is not active!</h1>
            </div>
        @endif
        <button wire:click="$refresh">Refresh page!</button>
    </div>
</div>
