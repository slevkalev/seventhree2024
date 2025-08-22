<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <h1>Register</h1>

<form method="POST" action="/register" class="register-form">
    @csrf
  <div>

        <x-form-field>
            <x-form-label for="title">First Name</x-form-label>
            <div class="input-div">
                <x-form-input name="first_name" id="title" :value="old('first_name')" required />

            </div>
            <x-form-error name="first_name" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="last_name">Last Name</x-form-label>
            <div class="input-div">
                <x-form-input name="last_name" id="last_name" :value="old('last_name')" required />

            </div>
            <x-form-error name="last_name" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="phone">Phone</x-form-label>
            <div class="input-div">
                <x-form-input name="phone" id="phone" :value="old('phone')" required />

            </div>
            <x-form-error name="phone" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="email">E-mail</x-form-label>
            <div class="input-div">
                <x-form-input name="email" x id="email" type="email" :value="old('email')" required />

            </div>
            <x-form-error name="email" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="password">Password</x-form-label>
            <div class="input-div">
                <div class="field-input">

                <input class="register-input wd80" type="password" id="password" name="password" required>

                <button type="button" class="show-btn">show</button>
                    </div>

                </div>
                <x-form-error name="password" />
        </x-form-field>

        <x-form-field>
            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
            <div class="input-div">
                <x-form-input name="password_confirmation" id="password_confirmation" type="text" required />

            </div>
            <x-form-error name="password_confirmation" />
        </x-form-field>




          <div class="button-div">
            <a href="/" class="">Cancel</a>
            <x-form-button>Submit</x-form-button>
          </div>
  </div>
</form>


<script>
  const passwordInput = document.getElementById('password');
  const toggleBtn = document.querySelector('.show-btn');

  toggleBtn.addEventListener('click', () => {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleBtn.textContent = 'Hide';
    } else {
      passwordInput.type = 'password';
      toggleBtn.textContent = 'Show';
    }
  });
</script>
</x-layout>

