<x-layout_dash>
    <x-slot:heading>
        Games Page
    </x-slot:heading>
    <x-nav-block></x-nav-block>
    <x-nav-week></x-nav-week>


    <h2>Games Week {{ $week }}</h2>



    <h4 class="center pad1">Today {{ $today }}</h4>

    <h5 class="center pad1">Click on a game to make pick</h5>



    <section id="games">
    @foreach ($games as $game)

        @if($picks->contains($game->id))

            @foreach($picksFull as $pick)

                @if($pick->game == $game->id && $pick->user == $user )

                    <a href="/user-picks/{{ $pick->id }}/edit" class="game">

                @endif

            @endforeach

        @else

            <a href="/user-picks/create/{{ $game->id }}" class="game">

        @endif

        @if($game->locked)

            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>

        @else

            <div class="space"></div>

        @endif

            <div class="game-team">
                <img src="../images/logos/{{ $game->awayTeam()->pluck('image')->first() }}" width="40" height="40" alt="">
                <span class="game-team-name">{{ $game->awayTeam()->pluck('short_name')->first() }}</span>
                <span class="game-points">{{ $game->away_pts }}</span>

            </div>

            <div class="game-team">
                <img src="../images/logos/{{ $game->homeTeam()->pluck('image')->first() }}" width="40" height="40" alt="">
                <span class="game-team-name">{{ $game->homeTeam()->pluck('short_name')->first() }}</span>
                <span class="game-points">{{ $game->home_pts }}</span>
            </div>
            <div class="game-date">


                    @php

                        $dateString =  $game->game_date ; // Input date string
                        $date = DateTime::createFromFormat('m/d/Y', $dateString); // Create DateTime object
                        $dayString = $date->format('D'); // Format to get the day abbreviation

                        $dateResult = $dayString." ".$game->game_time;
                        $statusOptions = [$dateResult, "1st", "2nd", "3rd", "4th", "OT", "Final"];

                        $status=$statusOptions[$game->game_status];

                    @endphp

                    {{$status}}



            </div>


            @if($picks->contains($game->id))

                <div class="checkmark">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m381-240 424-424-57-56-368 367-169-170-57 57 227 226Zm0 113L42-466l169-170 170 170 366-367 172 168-538 538Z"/></svg>

                    @foreach($picksFull as $pick)

                        @if($pick->game == $game->id && $pick->user == $user)

                                <span>{{ $pick->team()->pluck('short_name')->first() }}</span>
                                <span>{{ $pick->points }}</span>

                        @endif

                    @endforeach

                </div>
            @else

                <div class="space"></div>

            @endif

        </a>
    @endforeach
    </section>

    <script>

        const picks = @json($picksFull)

        console.table(picks)


        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>
</x-layout_dash>
