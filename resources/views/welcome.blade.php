<x-layout>
<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <div class="row">
            <div class="col-lg-4 ml-auto">
        <!-- Masthead Avatar Image--><img class="masthead-avatar mb-3" src="/img/logo.png" alt="">
            </div>
            <div class="col-lg-8 mr-auto">
                <h1 class="masthead-subheading text-uppercase mb-0">Willkommen bei WortWölkchen!</h1>
                <!-- Icon Divider-->
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Online Umfragen - kostenlos und datensparsam</p>
                

            </div>
        </div>
        <!-- Masthead Heading-->
    </div>
</header>


<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        
    </div>
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Online-Umfrage erstellen</h2>

        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form id="contactForm" method="post" action="{{ url('survey-create') }}"">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="question" type="text" name="question" placeholder="Gib die Frage ein:" data-sb-validations="required" />
                        <label for="name">Frage</label>
                        <div class="invalid-feedback" data-sb-feedback="question:required">Ohne Fage geht's leider nicht.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="email" />
                        <label for="email">Deine eMail (optional)</label>

                        <div class="invalid-feedback" data-sb-feedback="email:email">eMail leider nicht gültig.</div>
                    </div>

                    
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit Button-->
                    <button type="submit" class="btn btn-primary btn-xl">Umfrage erstellen</button>

                </form>
            </div>
        </div>
    </div>
</section>

</x-layout>