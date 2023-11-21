<x-layout-bs  headeroff="true">
    <style>
        html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

    </style>

    <main class="form-signin w-100 m-auto">
            <form method="post" action={{ url('word-create') }}>
                @csrf
                <input type="hidden" name="survey_id" value="{{ $survey->id }}">
                <input type="hidden" name="survey_external_id" value="{{ $survey->external_id }}">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <h1 class="h3 mb-3 fw-normal">{{ $survey->question }}</h1>

                <div class="form-floating">
                    <input class="form-control" id="floatingInput" type="text" name="word" placeholder="Antwort">
                    <label for="floatingInput">Deine Antwort:</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Abschicken</button>
            </form>
    </main>
</x-layout-bs>
