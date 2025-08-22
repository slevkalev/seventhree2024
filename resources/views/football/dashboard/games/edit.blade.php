<x-layout_dash_edit>
    <x-slot:heading>
        Edit Game
    </x-slot:heading>

    <nav>
        <a href="/dashboard/games">Games</a>
    </nav>

    <h2>Game: {{ $game->id }} {{ $game->awayTeam()->pluck('city')->first() }} {{ $game->awayTeam()->pluck('name')->first() }} at {{ $game->homeTeam()->pluck('city')->first() }} {{ $game->homeTeam()->pluck('name')->first() }}</h2>

    <form method="POST" action="/dashboard/games/{{ $game->id }}">
        @csrf
        @method('PATCH')
        <div class="container">

            <div class="label-input-grp">

                <label for="week" class="">Week</label>

                <input
                    type="text"
                    name="week"
                    id="week"
                    class=""

                    value="{{ $game->week  }}"
                    required>


                @error('week')
                <p class="error-message"> {{ $message }} </p>
                @enderror

            </div>

            <div class="label-input-grp">

                <label for="game_date" class="">Date</label>

                <input
                    type="text"
                    name="game_date"
                    id="game_date"
                    class=""

                    value="{{ $game->game_date  }}"
                    required>


                    @error('game_date')
                    <p class="error-message"> {{ $message }} </p>
                    @enderror

            </div>

            <div class="label-input-grp">

                <label for="game_time" class="">Time</label>

                <input
                    type="text"
                    name="game_time"
                    id="game_time"
                    class=""

                    value="{{ $game->game_time  }}"
                    required>


                @error('game_time')
                <p class="error-message"> {{ $message }} </p>
                @enderror

            </div>

            <input
                type="hidden"
                name="home_team"
                id="home_team"
                class=""
                value="{{ $game->home_team  }}"
                required>

            <input
                type="hidden"
                name="away_team"
                id="away_team"
                class=""
                value="{{ $game->away_team  }}"
                required>


            <div class="label-input-grp">

                <label for="home_pts" class="">{{ $game->homeTeam()->pluck('city')->first() }}</label>

                    <input
                        type="text"
                        name="home_pts"
                        id="home_pts"
                        class=""
                        value="{{ $game->home_pts  }}"
                        required>


                    @error('home_pts')
                    <p class="error-message"> {{ $message }} </p>
                    @enderror

            </div>

            <div class="label-input-grp">

                <label for="away_pts" class="">{{ $game->awayTeam()->pluck('city')->first() }}</label>

                <input
                    type="text"
                    name="away_pts"
                    id="away_pts"
                    class=""
                    value="{{ $game->away_pts  }}"
                    required>


                @error('away_pts')
                <p class="error-message"> {{ $message }} </p>
                @enderror

            </div>

            <div class="label-input-grp">

                <label for="game_status" class="">Status</label>

                <input
                    type="text"
                    name="game_status"
                    id="game_status"
                    class=""
                    value="{{ $game->game_status  }}"
                    required>


                @error('game_status')
                <p class="error-message"> {{ $message }} </p>
                @enderror

            </div>

            <div class="label-input-grp">

                <label for="locked" class="">Locked</label>

                <input
                    type="text"
                    name="locked"
                    id="locked"
                    class=""
                    value="{{ $game->locked  }}"
                    required>

                @error('locked')
                <p class="error-message"> {{ $message }} </p>
                @enderror

            </div>

        </div>


    <div class="edit-buttons">


            <a href="/dashboard/games/{{ $game->id }}" class="link">Cancel</a>

            <x-form-button type="submit" class="">Update</x-form-button>

    </div>
    </form>

    <form method="POST" action="/dashboard/games/{{ $game->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')

    </form>

    <script>

        const container = document.querySelector('.container')

        container.classList.add('mw350')


    </script>
    <script>
        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>

</x-layout_dash_edit>
