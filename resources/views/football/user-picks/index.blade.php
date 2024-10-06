<x-layout>
    <x-slot:heading>
        User Picks
    </x-slot:heading>
    <x-nav-block></x-nav-block>
   <x-nav-week-picks></x-nav-week-picks>

    <h2>User Picks</h2>

    <span>Week {{ $currentWeek }}</span>
    <span>Today {{ $today }}</span>

    <div id="user-picks">

        @if($picks->isEmpty())
            <div>You have not made any picks yet.</div>

        @else

            @foreach($picks as $pick)

            <a href="/user-picks/{{ $pick->id }}/edit">
                <div>
                    <span>{{ $pick->points }}</span>
                    <img src="/images/logos/{{$pick->team->image}}" width="40px" height="40px" alt="{{$pick->team->image}}.png">
                    <span>{{ $pick->team->short_name}}</span>
                </div>
            </a>
            @endforeach

        @endif

    </div>

    <script>

        const games = @json($games);
        const teams = @json($teams);
        const picks = @json($picks);
        const currentUser = @json($currentUser);
        const userPicksDiv = document.querySelector("#user-picks")
        const gameStatusArr = ['', "1st", "2nd", "3rd", "4th", "OT", "Final"]

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


        console.log(picks)
        console.table(games)


        // function gameInfo(id){
        //     return games[id-1]
        // }

        // function teamInfo(id){
        //     return teams[id-1]
        // }

        // const userPicks = []

        // picks.forEach(pick =>{

        //         const gameid = gameInfo(pick.game)
        //         const data = {
        //             id: pick.id,
        //             user: pick.user,
        //             game: gameInfo(pick.game),
        //             home: teamInfo(gameid.home_team),
        //             away: teamInfo(gameid.away_team),
        //             picked: teamInfo(pick.pick),
        //             points: pick.points
        //         }
        //         userPicks.push(data)

        // })


        // function sortByID(array) {
        //      return array.sort((a, b) => b.points - a.points);
        // }



        // console.log(userPicks)

        // sortByID(userPicks)


        // // sortByProperty(userPicks, game.id)


        // function displayPicks (pickArr) {
        //     for(pick of pickArr){


        //          let selected = pick.picked === pick.home? "home": "away"

        //         function winner(){
        //             if(pick.game.game_status == 6){


        //                 if(pick.game.home_pts === pick.game.away_pts) return "tied"
        //                 if(pick.game.home_pts > pick.game.away_pts) return "home"
        //                 if(pick.game.home_pts < pick.game.away_pts) return "away"
        //             }
        //             return ""
        //         }

        //         let result = winner()
        //         console.log(`winner ${result}`)


        //         console.log(`selected ${selected}`)

        //         let tag =""
        //         if(pick.game.game_status == 6){

        //             if(selected===result || result ==="tied"){
        //                 tag = "win"
        //             }else{
        //                 tag ="loss"
        //             }

        //         }

        //         let lockedsvg =`<svg class="status-svg" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>`
        //         let unlockedsvg = `<svg class="status-svg" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fff"><path d="M240-160h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM240-160v-400 400Zm0 80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h280v-80q0-83 58.5-141.5T720-920q83 0 141.5 58.5T920-720h-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80h120q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Z"/></svg>`


        //         let editBtn = `<a href="/user-picks/${pick.id}" class="">Edit</a>`



        //         let gameDay = pick.game.game_date
        //         let gameTime = pick.game.game_time

        //         let linkDiv = pick.game.locked==0? `<a href='user-picks/create/${pick.game.id}' class="pick-info">`: `<div class="pick-info">`
        //         let linkDivEnd = pick.game.locked==0? `</a>`: `</div>`

        //         let gameTeamsBefore = `

        //             <div class="team-div">
        //                 <img src="/images/logos/${pick.away.image}" alt="/${pick.away.image}" height="75" width="75">
        //                 <span class="awayteam">${pick.away.name}</span>

        //             </div>

        //             <div class="team-div">
        //                 <img src="/images/logos/${pick.home.image}" alt="/${pick.home.image}" height="75" width="75">
        //                 <span class="hometeam"> ${pick.home.name}</span>

        //             </div>

        //                 <div class="game-details">
        //                 <span>${gameDay}</span>
        //                 <span>${gameTime}</span>
        //                 <span>at ${pick.home.city}</span>
        //             </div>
        //         `

        //         let gameTeamsAfter = `

        //             <div class="team-div">
        //                 <img src="/images/logos/${pick.away.image}" alt="/${pick.away.image}" height="75" width="75">
        //                 <span class="awayteam">${pick.away.name}</span>
        //                 <span class="score">${pick.game.away_pts}</span>
        //             </div>

        //             <div class="team-div">
        //                 <img src="/images/logos/${pick.home.image}" alt="/${pick.home.image}" height="75" width="75">
        //                 <span class="hometeam"> ${pick.home.name}</span>
        //                 <span class="score">${pick.game.home_pts}</span>
        //             </div>

        //             <div class="game-details">
        //                 <span>${gameStatusArr[pick.game.game_status]}</span>
        //             </div>

        //             `

        //         userPicksDiv.insertAdjacentHTML('afterbegin',  `

        //         ${linkDiv}

        //                 <div class="picked-banner ${tag}">
        //                     ${pick.game.locked==1? lockedsvg : unlockedsvg}
        //                     <span>Your Pick:</span>
        //                     <span class="picked">${pick.picked.name}</span>
        //                     <span>for</span>
        //                     <span class="points">${pick.points}</span>
        //                 </div>
        //                 <h3>Game ${pick.game.id}</h3>


        //                 ${pick.game.game_status == 0? gameTeamsBefore : gameTeamsAfter}

        //         ${linkDivEnd}
        //         `)
        //     }
        // }

        // displayPicks(userPicks)

    </script>




    {{-- @foreach ($games as $game)

        @if (! $game->locked)
            <div>

                <a href="/user-picks/create/{{$game->id}}" class="game-info">

                    <span>Game {{ $game->id }}</span>
                    <div class="user-pics_game-teams">
                        <img src="/images/logos/{{ $game->away_team()->pluck('image')->first() }}" alt="{{ $game->away_team()->pluck('city')->first() }}">
                        <span>{{ $game->away_team()->pluck('city')->first() }} {{ $game->away_team()->pluck('name')->first() }}</span>
                        @
                        <img src="/images/logos/{{ $game->home_team()->pluck('image')->first() }}" alt="">
                        <span>{{ $game->home_team()->pluck('city')->first() }} {{ $game->home_team()->pluck('name')->first() }}</span>
                    </div>
                    <div class="user-pcis__game-info">
                        <span>{{ $game->game_status == 0 ? "" : $game->game_status . "QTR" }}</span>
                        <span> {{ $game->game_date }}</span>
                        <span>{{ $game->game_time }}</span>
                    </div>

                </a>
            </div>
        @else

            <   <section class="game-info">
                <span>Game {{ $game->id }}</span>


                <span>{{ $game->away_team()->pluck('city')->first() }} {{ $game->away_team()->pluck('name')->first() }}</span>
                @
                <span>{{ $game->home_team()->pluck('city')->first() }} {{ $game->home_team()->pluck('name')->first() }}</span>

                <span>{{ $game->game_status == 0 ? "" : $game->game_status . "QTR" }}</span>

                <span> {{ $game->game_date }}</span>

                <span>{{ $game->game_time }}</span>
            </section>

        @endif

    @endforeach --}}

</x-layout>
