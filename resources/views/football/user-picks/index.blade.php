<x-layout>
    <x-slot:heading>
        User Picks
    </x-slot:heading>

    <h2>User Picks!!!</h2>

    <span>Week {{ $currentWeek }}</span>
    <span>Today {{ $today }}</span>

    @foreach ($games as $game)

        @if (! $game->locked)
            <div>

                <a href="/user-picks/create/{{$game->id}}" class="game-info">
                    <span>Game {{ $game->id }}</span>


                    <span>{{ $game->away_team()->pluck('city')->first() }} {{ $game->away_team()->pluck('name')->first() }}</span>
                    @
                    <span>{{ $game->home_team()->pluck('city')->first() }} {{ $game->home_team()->pluck('name')->first() }}</span>

                    <span>{{ $game->game_status == 0 ? "" : $game->game_status . "QTR" }}</span>

                    <span> {{ $game->game_date }}</span>

                    <span>{{ $game->game_time }}</span>
                </a>
            </div>
        @else

            <   <section class="game-info">
                <span>Game {{ $game->id }}</span>


                <span>{{ $game->away_team()->pluck('city')->first() }} {{ $game->away_team()->pluck('name')->first() }}</span>
                @
                <span>{{ $game->home_team()->pluck('city')->first() }} {{ $game->home_team()->pluck('name')->first() }}</span>

                <span>{{ $game->game_status == 0 ? "" : $game->game_status . "QTR" }}</span>

                <span> {{ $game->game_date }}</span>

                <span>{{ $game->game_time }}</span>
            </section>

        @endif

    @endforeach

</x-layout>
