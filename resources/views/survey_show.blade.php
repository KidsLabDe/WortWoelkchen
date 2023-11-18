Willkemmen zur Umfrage: {{ $survey->name}} <br>

Hier ist die Frage: <br>


<h1>{{ $survey->question }}</h1>


{{ $qrCode }}

<a href="{{ $url }}">Link zur Umfrage</a>

<a href="{{ url('survey-result', ['survey_id' => $survey->external_id]) }}">Link zu den Ergebnissen</a>