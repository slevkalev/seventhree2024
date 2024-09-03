<x-layout_dash>
    <x-slot:heading>
        Create Team
    </x-slot:heading>

    <h2>Create Team</h2>

<form method="POST" action="/dashboard/teams">
    @csrf
  <div class="container">
    <div class="">
      <h2 class="">New Team</h2>
      <p class="">create new team</p>

      <div class="">
        <x-form-field>
            <x-form-label for="city">City</x-form-label>
            <div class="">
                <x-form-input name="city" id="city" required />

                <x-form-error name="city" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="name">Name</x-form-label>
            <div class="">
                <x-form-input name="name" id="name" required />

                <x-form-error name="name" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="short_name">Short name</x-form-label>
            <div class="">
                <x-form-input name="short_name" id="short_name" required />

                <x-form-error name="short_name" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="conference">Conference</x-form-label>
            <div class="">
                <x-form-input name="conference" id="conference" required />

                <x-form-error name="conference" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="division">Divison</x-form-label>
            <div class="">
                <x-form-input name="division" id="division" required />

                <x-form-error name="division" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="image">Image</x-form-label>
            <div class="">
                <x-form-input name="image" id="image" required />

                <x-form-error name="image" />

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
