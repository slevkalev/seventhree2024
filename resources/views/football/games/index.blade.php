<x-layout>
    <x-slot:heading>
        Games
    </x-slot:heading>

    <nav>
        <span>Week</span>
        <a href="/games/1">1</a>
        <a href="/games/2">2</a>
        <a href="/games/3">3</a>
        <a href="/games/4">4</a>
        <a href="/games/5">5</a>
        <a href="/games/6">6</a>
        <a href="/games/7">7</a>
        <a href="/games/8">8</a>
        <a href="/games/9">9</a>
        <a href="/games/10">10</a>
        <a href="/games/11">11</a>
        <a href="/games/12">12</a>
        <a href="/games/13">13</a>
        <a href="/games/14">14</a>
        <a href="/games/15">15</a>
        <a href="/games/16">16</a>
        <a href="/games/17">17</a>
        <a href="/games/18">18</a>
    </nav>


    <h2>Games Page!!!</h2>
    <section id="games">
    @foreach ($games as $game)
        <a href="/user-picks/create/{{ $game->id }}" class="game">
            <div>{{ $game->away_team()->pluck('short_name')->first() }} {{ $game->away_pts }}</div>
            <div>{{ $game->home_team()->pluck('short_name')->first() }} {{ $game->home_pts }}</div>
        </a>
    @endforeach
    </section>

    <script>
        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>

</x-layout>
