<x-layout_dash>
    <x-slot:heading>
        All Games
    </x-slot:heading>

    <x-nav-block></x-nav-block>

    <section>


    <h2>All Games</h2>

    <h3 class="current-wk"></h3>
{{--
    <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div> --}}
    <br>
    <div class="wk-btns">
        <button class="wk-btn">1</button>
        <button class="wk-btn">2</button>
        <button class="wk-btn">3</button>
        <button class="wk-btn">4</button>
        <button class="wk-btn">5</button>
        <button class="wk-btn">6</button>
        <button class="wk-btn">7</button>
        <button class="wk-btn">8</button>
        <button class="wk-btn">9</button>
        <button class="wk-btn">10</button>
        <button class="wk-btn">11</button>
        <button class="wk-btn">12</button>
        <button class="wk-btn">13</button>
        <button class="wk-btn">14</button>
        <button class="wk-btn">15</button>
        <button class="wk-btn">16</button>
        <button class="wk-btn">17</button>
        <button class="wk-btn">18</button>
    </div>
    <br>



        @foreach ($games as $game)

            <a href="/dashboard/games/{{ $game['id'] }}" class="gm" data-week="{{$game->week}}">

                <div id="section{{ $game->id }}" class="game-card">

                    <div class="game-card-week">
                        <span class="game-id">{{ $game->id }}</span>
                        <span>Wk {{ $game->week }}</span>
                        <span>{{ $game->game_date }}</span>
                        <span>{{ $game->game_time }}</span>
                    </div>
                    <div class="game-card-game">
                        <div class="game-card-team">
                            {{-- <span>{{ $game->awayTeam()->pluck('city')->first() }}</span> --}}
                            <span> {{ $game->awayTeam()->pluck('short_name')->first() }}</span>
                            <span>{{ $game->away_pts }}</span>
                        </div>

                        <div class="game-card-team">
                            {{-- <span>{{ $game->homeTeam()->pluck('city')->first() }}</span> --}}
                            <span> {{ $game->homeTeam()->pluck('short_name')->first() }}</span>
                            <span>{{ $game->home_pts }}</span>
                        </div>
                        <div class="game-card-game">
                            <span>{{$game->game_status == 6? "Final" : "pending"}}</span>
                            <span>{{$game->locked == 1? "locked" : "open"}}</span>
                        </div>
                    </div>
                </div>
            </a>


        @endforeach



    <hr>
    {{-- <div>
        <a href="/dashboard/games/create">Create Game</a>
    </div> --}}

    </section>

    <script>
        const games = document.querySelectorAll('.gm')
        const currentWk = document.querySelector('.current-wk')
        const week = @json($week)

        const attValue = `${week}`

        currentWk.innerText = `Week ${week}`

        games.forEach(element=>{
            if(element.getAttribute("data-week") !== attValue){
                element.style.display='none'
            }
        })

        const btns = document.querySelectorAll('.wk-btn')
            btns.forEach(btn =>{
                btn.addEventListener('click', ()=>{
                   let week = btn.textContent.trim()
                   let elements = document.querySelectorAll('.gm')
                   document.querySelector(".current-wk").innerText=`Week ${week}`
                   elements.forEach(element=>{
                     element.style.display='none'
                   })
                   let matching = document.querySelectorAll('[data-week="'+ week +'"]')
                   matching.forEach(match=>{
                    match.style.display=""
                   })
                })
            })



    </script>
    <script>
        const currentUser = @json($currentUser)

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>


</x-layout_dash>
