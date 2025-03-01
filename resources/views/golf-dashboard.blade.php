<x-layout>
    <x-slot:heading>
        Golf Dashboard
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>

    <h1>Golf Pool Dashboard</h1>
    <div>{{ $today }}</div>



    <form method="POST" action="/golf-dashboard">
        @csrf

        <textarea name="golferList" id="golferList" cols="70" rows="20"></textarea>

        <button>Submit</button>

    </form>



</x-layout>
