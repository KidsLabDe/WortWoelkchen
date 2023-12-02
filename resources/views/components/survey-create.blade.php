<section>
    <form id="contactForm" method="post" action="{{ url('survey-create') }}"">
        @csrf

        <div class="container py-4 py-xl-5">
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
                <!-- <div class="form-floating mb-3">
                <input class="form-control" id="question" type="text" name="question" placeholder="Gib die Frage ein:"  />
                <label for="name">Frage</label>
                
            </div> -->

                <div class="col-lg-12 fs-1 text-center align-self-center"><input type="text" id="questien"
                        name="question" placeholder="Deine Frage" autofocus="" required=""
                        data-sb-validations="required"></div>
                <div class="invalid-feedback" data-sb-feedback="question:required">Ohne Fage geht's leider nicht.</div>

                <div class="col-lg-12" >
                    <h2>Zeitlimit</h2>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="time" id="inlineRadio1"
                            value="30">
                        <label class="form-check-label" for="inlineRadio1">30 Sek.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="time" id="inlineRadio2"
                            value="60">
                        <label class="form-check-label" for="inlineRadio2">60 Sek.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="time" id="inlineRadio2"
                            value="120">
                        <label class="form-check-label" for="inlineRadio2">2 Minuten</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="time" id="inlineRadio2"
                            value="-1" checked>
                        <label class="form-check-label" for="inlineRadio2">(kein limit))</label>
                    </div>

                </div>



                <div class="col-lg-12">
                    <h1>Umfrage-Typ wählen</h1>
                </div>
                <div class="col-lg-12">
                    <div class="accordion" role="tablist" id="accordion-3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-1" aria-expanded="true"
                                    aria-controls="accordion-3 .item-1">Multiple-Choice</button>
                                <div class="input-group"></div>
                            </h2>
                            <div class="accordion-collapse collapse show item-1" role="tabpanel"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <p class="mb-0">Gib die möglichen Antworten ein: </p>
                                    <div class="input-group"><span class="input-group-text">Antwort 1</span><input
                                            class="form-control" type="text" value="Ja" name="answer1"></div>
                                    <div class="input-group"><span class="input-group-text">Antwort 2</span><input
                                            class="form-control" type="text" value="Nein" name="answer2"></div>
                                    <div class="input-group"><span class="input-group-text">Antwort 3</span><input
                                            class="form-control" type="text" value="(Enthaltung)" name="answer3">
                                    </div>
                                    <div class="input-group"><span class="input-group-text">Antwort 4</span><input
                                            class="form-control" type="text" name="answer4"></div>
                                    <div class="input-group"><span class="input-group-text">Antwort 5</span><input
                                            class="form-control" type="text" name="answer5"></div>
                                    <div class="input-group"><span class="input-group-text">Antwort 6</span><input
                                            class="form-control" type="text" name="answer6"></div>
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit" name="type"
                                            value="multiple-choice">Multiple-Choice Umfrage
                                            starten</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-2"
                                    aria-expanded="false" aria-controls="accordion-3 .item-2">Wort-Wolke</button></h2>
                            <div class="accordion-collapse collapse item-2" role="tabpanel"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <p class="mb-0">Starte eine offene Umfrage: jeder kann Begriffe eingeben, sie
                                        werden als Wort-Wolke dargestellt und nach Häufigkeit sortiert.</p>
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit" name="type"
                                            value="word">Offene Umfrage</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-3"
                                    aria-expanded="false" aria-controls="accordion-3 .item-3">Feedback in
                                    Schulnoten</button></h2>
                            <div class="accordion-collapse collapse item-3" role="tabpanel"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <p class="mb-0">Die Teilnehmer können mit 1 (sehr gut) bis 6 (ungenügend)
                                        antworten.</p>
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit" name="type"
                                            value="feedback">Feedback</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#accordion-3 .item-4"
                                    aria-expanded="false" aria-controls="accordion-3 .item-4">Kontaktdaten</button>
                            </h2>
                            <div class="accordion-collapse collapse item-4" role="tabpanel"
                                data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    <p class="mb-0">Du möchtest nach dem Event noch Infos an die Teilnehmer schicken?
                                        Dann frage nach den Kontaktdaten!</p>
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="submit" name="type"
                                            value="contact">Kontaktdaten</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
