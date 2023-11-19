<x-layout>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <x-hero-side :image="$qrCode">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">{{ $survey->question }}</h1>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="lead">Teilnehmer scannen bitte den QR-Code.</p>
                <p class="lead">Oder: <a href="wortwoelkchen.de/{{ $survey->external_id }}">https://wortwoelkchen.de/{{ $survey->external_id }}</a></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ url('survey-result', ['survey_id' => $survey->external_id]) }}"
                        class="btn btn-primary btn-lg px-4 gap-3" role="button" target="_blank">Zu den Ergebnissen</a>
                    <a href="{{ url('survey-end', ['survey_id' => $survey->external_id]) }}"
                        class="btn btn-danger btn-lg px-4 gap-3" role="button" target="_blank">Umfrage beenden</a>
                    <!-- <a href="{{ $url }}" class="btn btn-outline-secondary btn-lg px-4" role="button"
                        target="_blank">Zur Umfrage</a> -->
                </div>
                <livewire:surveylive :survey="$survey" />
            </x-hero-side>
        </div>
    </section>

</x-layout>
