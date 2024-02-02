<div>

    <div class="podcast">
        <header>
            <h2>title</h2>
            <p>description</p>
        </header>
        <aside>
            <h3>Participants</h3>
            @foreach($participants as $participant)
                {{ $participant }}
            @endforeach
        </aside>
    </div>
</div>