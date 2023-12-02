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
    <form wire:submit="save">
        @if ($survey->enabled)
            @if ($survey->type == 'word')
                <div class="form-floating">
                    <input class="form-control" id="floatingInput" type="text" name="answer"
                        placeholder="Antwort" wire:model="answer">
                    <label for="floatingInput">Deine Antwort:</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit" >Abschicken</button>
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
    <tr>
        <td>{{ $survey->external_id }}</td>
        <td>{{ $survey->question }}</td>
        <td>{{ time() }}</td>
        <td>{{ $survey->start }}</td>
        <td>{{ $survey->time }}</td>
        <td>{{ $survey->time_left }}</td>
        <td>{{ $survey->enabled }}</td>
        <td>{{ $survey->answer_count }}</td>
    </tr>

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