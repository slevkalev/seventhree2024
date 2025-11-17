<x-layout_dash>
    <x-slot:heading>
        Game
    </x-slot:heading>

    <h2 class="font-bold text-lg">Game# {{ $game->id }}</h2>
    <div>
        <p>
            {{ App\Models\Team::find($game->away_team)->city }} {{ App\Models\Team::find($game->away_team)->name }}
        </p>
        AT
        <p>
            {{ App\Models\Team::find($game->home_team)->city }} {{ App\Models\Team::find($game->home_team)->name }}
        </p>
        <span>Week {{ $game->week}}</span>
        <span>Date {{ $game->game_date}}</span>
        <span>Time {{ $game->game_time}}</span>

    </div>

    {{-- @can('edit-game', $game) --}}
    <p class= "mt1rem">
        <a class="games-edit-btn" href="/dashboard/games/{{ $game->id }}/edit">Edit Game</a>
    </p>
    {{-- @endcan --}}

    <p class="mt1rem">
        <a class="games-page-btn" href="/dashboard/games">Games</a>
    </p>

    <script>
        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>

</x-layout_dash>
