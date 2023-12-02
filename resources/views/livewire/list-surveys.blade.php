<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1>Surveys</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Survey Name</th>
                <th>Question</th>
                <th>now</th>
                <th>Start Time</th>
                <th>Time set</th>
                <th>Time Left</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Surveys as $Survey)
                <tr>
                    <td>{{ $Survey->external_id }}</td>
                    <td>{{ $Survey->question }}</td>
                    <td>{{ time() }}</td>
                    <td>{{ $Survey->start }}</td>
                    <td>{{ $Survey->time }}</td>
                    <td>{{ $Survey->time_left }}</td>
                    <td>{{ $Survey->enabled }}</td>
                    <td>{{ $Survey->answer_count }}</td>
                </tr>
            @endforeach
        </tbody>
        
    
</div>
