<x-layout>
    <x-slot:heading>
        Games
    </x-slot:heading>
    <x-nav-block></x-nav-block>

    <x-nav-week></x-nav-week>

    <h2>Games for Week {{ $week }}</h2>
    <section id="games">
    @foreach ($games as $game)
        <a href="/user-picks/create/{{ $game->id }}" class="game">
            <div>{{ $game->awayTeam()->pluck('short_name')->first() }} {{ $game->away_pts }} </div>
            <div>{{ $game->homeTeam()->pluck('short_name')->first() }} {{ $game->home_pts }}</div>

            @if($picks->contains($game->id))
            <div class="checkmark">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m381-240 424-424-57-56-368 367-169-170-57 57 227 226Zm0 113L42-466l169-170 170 170 366-367 172 168-538 538Z"/></svg>
            </div>
            @endif
        </a>
    @endforeach

    </section>

    <script>
        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>

</x-layout>
