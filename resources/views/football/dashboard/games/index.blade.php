<x-layout_dash>
    <x-slot:heading>
        All Games
    </x-slot:heading>

    <x-nav-block></x-nav-block>

    <h2>All Games</h2>
{{--
    <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div> --}}
    <br>
    <hr>




        @foreach ($games as $game)

            <a href="/dashboard/games/{{ $game['id'] }}" class="gm" data-week="{{$game->week}}">


                    <span>Game: {{ $game->id }}</span>
                    <div>
                        <span>Week {{ $game->week }}</span>
                        <span>{{ $game->game_date }}</span>
                        <span>{{ $game->game_time }}</span>

                    </div>
                    <div>
                        <span>{{ $game->awayTeam()->pluck('city')->first() }} {{ $game->awayTeam()->pluck('name')->first() }} at {{ $game->homeTeam()->pluck('city')->first() }} {{ $game->homeTeam()->pluck('name')->first() }}</span>
                    </div>
                    <div>{{$game->locked == 1? "locked" : "open"}}</div>

            </a>


        @endforeach



    <hr>
    {{-- <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div> --}}

    <script>
        const elements = document.querySelectorAll('.gm')
        const week = @json($week)


        const attValue = `${week}`

        elements.forEach(element => {
                if (element.getAttribute("data-week") !== attValue) {
                element.classList.add('hide');
            }
        });

    </script>


</x-layout_dash>
