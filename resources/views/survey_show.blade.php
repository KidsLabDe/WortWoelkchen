<x-layout>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <x-hero-side :image="$qrCode">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">{{ $survey->question }}</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ url('survey-result', ['survey_id' => $survey->external_id]) }}"
                        class="btn btn-primary btn-lg px-4 gap-3" role="button" target="_blank">Zu den Ergebnissen</a>
                    <a href="{{ $url }}" class="btn btn-outline-secondary btn-lg px-4" role="button"
                        target="_blank">Zur Umfrage</a>
                </div>
            </x-hero-side>
        </div>
    </section>

</x-layout>
