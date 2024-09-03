<x-layout_dash>
    <x-slot:heading>
        Create Pick
    </x-slot:heading>

    <h2>Create Pick</h2>


<form method="POST" action="/dashboard/picks">
    @csrf
  <div class="container">
    <div class="">
      <h2 class="">New Pick</h2>
      <p class="">for Game</p>

      <div class="">
        <x-form-field>
            <x-form-label for="user">User</x-form-label>
            <div class="">
                <x-form-input name="user" id="user" required />

                <x-form-error name="user" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="Game">Game</x-form-label>
            <div class="">
                <x-form-input name="game" id="game" required />

                <x-form-error name="game" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="pick">Pick</x-form-label>
            <div class="">
                <x-form-input name="pick" id="pick" required />

                <x-form-error name="pick" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="points">Points</x-form-label>
            <div class="">
                <x-form-input name="points" id="points" required />

                <x-form-error name="points" />

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
