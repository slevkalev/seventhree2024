<x-layout_dash_edit>
    <x-slot:heading>
        Edit Game
    </x-slot:heading>

    <h2>Game: {{ $game->id }} {{ $game->home_team()->pluck('city')->first() }} {{ $game->home_team()->pluck('name')->first() }} at {{ $game->id }} {{ $game->away_team()->pluck('city')->first() }} {{ $game->away_team()->pluck('name')->first() }}</h2>

    <form method="POST" action="/dashboard/games/{{ $game->id }}">
        @csrf
        @method('PATCH')
    <div class="container">
        <div class="">
            <div class="">
                <div class="">
                    <label for="week" class="">Week</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="week"
                            id="week"
                            class=""

                            value="{{ $game->week  }}"
                            required>
                        </div>

                        @error('week')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="game_date" class="">Date</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="game_date"
                            id="game_date"
                            class=""

                            value="{{ $game->game_date  }}"
                            required>
                        </div>

                        @error('game_date')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="game_time" class="">Time</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="game_time"
                            id="game_time"
                            class=""

                            value="{{ $game->game_time  }}"
                            required>
                        </div>

                        @error('game_time')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="home_team" class="">Home Team</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="home_team"
                            id="home_team"
                            class=""
                            value="{{ $game->home_team  }}"
                            required>
                        </div>

                        @error('home_team')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="away_team" class="">Away Team</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="away_team"
                            id="away_team"
                            class=""
                            value="{{ $game->away_team  }}"
                            required>
                        </div>

                        @error('away_team')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="home_pts" class="">Home Pts</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="home_pts"
                            id="home_pts"
                            class=""
                            value="{{ $game->home_pts  }}"
                            required>
                        </div>

                        @error('home_pts')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="away_pts" class="">Home Pts</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="away_pts"
                            id="away_pts"
                            class=""
                            value="{{ $game->away_pts  }}"
                            required>
                        </div>

                        @error('away_pts')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="game_status" class="">Home Pts</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="game_status"
                            id="game_status"
                            class=""
                            value="{{ $game->game_status  }}"
                            required>
                        </div>

                        @error('game_status')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="locked" class="">Home Pts</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="locked"
                            id="locked"
                            class=""
                            value="{{ $game->locked  }}"
                            required>
                        </div>

                        @error('locked')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <button form="delete-form" class="">Delete</button>
        </div>
        <div class="">
            <a href="/dashboard/games/{{ $game->id }}" class="">Cancel</a>
            <div>
                <button type="submit" class="">Update</button>
            </div>
        </div>
    </div>
    </form>

    <form method="POST" action="/dashboard/games/{{ $game->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')

    </form>

</x-layout_dash_edit>
