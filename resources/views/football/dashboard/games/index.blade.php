<x-layout_dash>
    <x-slot:heading>
        All Games
    </x-slot:heading>

    <h2>All Games</h2>

    <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div>
    <br>
    <hr>

    <div class="container">


        @foreach ($games as $game)

            <a href="/dashboard/games/{{ $game['id'] }}" class="">

                <div>Game: {{ $game->id }} Week: {{ $game->week }} Date: {{ $game->game_date }} Time: {{ $game->game_time }} {{ $game->awayTeam()->pluck('city')->first() }} {{ $game->awayTeam()->pluck('name')->first() }} at {{ $game->homeTeam()->pluck('city')->first() }} {{ $game->homeTeam()->pluck('name')->first() }}</div>
            </a>


        @endforeach


    </div>
    <hr>
    <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div>
</x-layout_dash>
