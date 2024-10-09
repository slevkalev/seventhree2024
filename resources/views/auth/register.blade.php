<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <h1>Register</h1>

<form method="POST" action="/register">
    @csrf
  <div class="">
    <div class="">

      <div class="">
        <x-form-field>
            <x-form-label for="title">First Name</x-form-label>
            <div class="input-div">
                <x-form-input name="first_name" id="title" required />

                <x-form-error name="first_name" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="last_name">Last Name</x-form-label>
            <div class="input-div">
                <x-form-input name="last_name" id="last_name" required />

                <x-form-error name="last_name" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="email">E-mail</x-form-label>
            <div class="input-div">
                <x-form-input name="email" x id="email" type="email" required />

                <x-form-error name="email" />
            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="input-div">
                <x-form-input name="password" id="password" type="password" required />

                <x-form-error name="password" />
            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="password_confirmation">Confirm Pasword</x-form-label>
            <div class="input-div">
                <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />

                <x-form-error name="password_confirmation" />
            </div>
        </x-form-field>

      </div>

    </div>
  </div>

  <div class="button-div">
    <a href="/" class="">Cancel</a>
    <x-form-button>Register</x-form-button>
  </div>
</form>


</x-layout>

