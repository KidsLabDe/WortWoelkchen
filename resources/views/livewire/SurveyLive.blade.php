<div wire:poll="refreshWords">
    <div class="row">

        @isset($survey->end)
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    Umfrage beendet!
                </div>
            </div>
        @else
            <div class="col">
                <a href="{{ url('survey-end', ['survey_id' => $survey->external_id]) }}"
                    class="btn btn-danger btn-lg px-4 gap-3" role="button" target="_blank">Umfrage beenden</a>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>

            </div>
        @endisset
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">

                    <h3>{{ $wordcount }} Antworten</h3>
                </div>

                <div class="col">
                    <h3>{{ $usercount }} Teilnehmer</h3>
                </div>
            </div>
        </div>


    </div>
</div>
