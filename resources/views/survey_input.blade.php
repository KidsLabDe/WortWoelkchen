<div>
    <form method="post" action={{ url('word-create')}}>
        @csrf
        <input type="hidden" name="survey_id" value="{{ $survey->external_id }}">
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <input type="text" name="word" placeholder="word">
        <button type="submit">Abschicken!</button>
    </form>
    <!-- An unexamined life is not worth living. - Socrates -->
</div>
