<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">{{ $survey->question }}</h1>
    <p class="lead">{{ $survey->id }} / {{ $survey_id }}</p>
    <p class="lead">Anfang: {{ $survey->start }}</p>
    <p class="lead">Time: {{ $survey->time }}</p>
    <p class="lead">Type: {{ $survey->type }}</p>
    <p class="lead">Wörter: {{ $wordcount }}</p>
    <p class="lead">Deine Wörter: {{ $userwordcount }}</p>
    @if ($survey->type != 'word' and $wordcount == 1)
        <p class="lead">You have already answered this survey</p>
    @elseif ($survey->type == 'word')
        <p class="lead">Du hast schon {{ $wordcount }} Antworten abgegeben!</p>
    @else
        
        @if ($timeLeft > 0)
            <p class="lead">{{ $timeLeft }}</p>
        @elseif ($survey->time == -1)
            <p class="lead">no limit</p>
        @else
            <p class="lead">Time is up</p>
        @endif

    @endif

</div>

