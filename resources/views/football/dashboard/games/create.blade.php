<x-layout_dash>
    <x-slot:heading>
        Create Game
    </x-slot:heading>

    <h2>Create Game</h2>


<form method="POST" action="/dashboard/games">
    @csrf
  <div class="container">
    <div class="">
      <h2 class="">New Game</h2>
      <p class="">create new game</p>

      <div class="">
        <x-form-field>
            <x-form-label for="week">Week</x-form-label>
            <div class="">
                <x-form-input name="week" id="week" required />

                <x-form-error name="week" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="game_date">Date</x-form-label>
            <div class="">
                <x-form-input name="game_date" id="game_date" required />

                <x-form-error name="game_date" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="game_time">Time</x-form-label>
            <div class="">
                <x-form-input name="game_time" id="game_time" required />

                <x-form-error name="game_time" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="home_team">Home Team</x-form-label>
            <div class="">
                <x-form-input name="home_team" id="home_team" required />

                <x-form-error name="home_team" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="away_team">Away Team</x-form-label>
            <div class="">
                <x-form-input name="away_team" id="away_team" required />

                <x-form-error name="away_team" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="home_pts">Home Points</x-form-label>
            <div class="">
                <x-form-input name="home_pts" id="home_pts" required />

                <x-form-error name="home_pts" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="away_pts">Away Points</x-form-label>
            <div class="">
                <x-form-input name="away_pts" id="away_pts" required />

                <x-form-error name="away_pts" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="game_status">Status</x-form-label>
            <div class="">
                <x-form-input name="game_status" id="game_status" required />

                <x-form-error name="game_status" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="locked">Locked</x-form-label>
            <div class="">
                <x-form-input name="locked" id="locked" required />

                <x-form-error name="locked" />

            </div>
        </x-form-field>

      </div>
    </div>
  </div>

  <div class="">
    <button type="button" class="">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>
</form>


</x-layout_dash>
