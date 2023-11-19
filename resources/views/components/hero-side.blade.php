<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        @isset($image)
            <div class="col-10 col-sm-8 col-lg-6">
                {{ $image }}
            </div>
        @endisset
        <div class="col-lg-6">
            {{ $slot }}
        </div>
        @isset($header)
            <div class="col-10 col-sm-8 col-lg-6">
                <h1>{{ $header }}</h1>
            </div>
        @endisset
    </div>
</div>
