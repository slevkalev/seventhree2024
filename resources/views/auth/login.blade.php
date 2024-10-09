<x-layout>
    <x-slot:heading>
        Login - Seventhree.ca
    </x-slot:heading>
    <h1>Login</h1>


    <form method="POST" action="/login">
        @csrf
        <x-form-field>
            <x-form-label for="email">E-mail</x-form-label>
            <div class="input-div">
                <x-form-input name="email" id="username" type="text" placehoder="E-mail" :value="old('email')" required />

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


        <x-form-button>Submit</x-form-button>
        <div>
            {{-- <a href="#" class="link">Forgot Password</a> --}}
            <a href="/register" class="link">Create Account</a>
        </div>
    </form>
</x-layout>
