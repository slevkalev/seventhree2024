<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <h1>2024 NFL Pool</h1>

    <section class="news">
        <h3>News</h3>

        <span>Week 17</span>
        <span>16 games this week</span>

        <h3>Christmas Day Games</h3>
        <div class="game">
                <img src="/images/logos/chiefs.png" alt="chiefs.png" width="70px" height="70px">
                <span>Kansas City Chiefs</span>
            at
                <img src="/images/logos/steelers.png" alt="steelers.png" width="70px" height="70px">
                <span>Pittsburgh Steelers</span>

                <span>Wed 1:00 PM</span>
        </div>

        <div class="game">
            <img src="/images/logos/ravens.png" alt="ravens.png" width="70px" height="70px">
            <span>Baltimore Ravens</span>
            at
            <img src="/images/logos/texans.png" alt="texans.png" width="70px" height="70px">
            <span>Houston Texans</span>
            <span>Wed 4:30 PM</span>
        </div>


        <h3>Boxing Day Game</h3>
        <div class="game">
            <img src="/images/logos/seahawks.png" alt="seahawks.png" width="70px" height="70px">
            <span>Seattle Seahawks</span>
            at
            <img src="/images/logos/bears.png" alt="bears.png" width="70px" height="70px">
            <span>Chicago Bears</span>
            <span>Thurs 8:15 PM</span>
        </div>

        <h3>Saturday Games</h3>
        <div class="game">
            <img src="/images/logos/chargers.png" alt="chargers.png" width="70px" height="70px">
            <span>Los Angeles Chargers</span>
            at
            <img src="/images/logos/patriots.png" alt="patriots.png" width="70px" height="70px">
            <span>New England Patriots</span>
            <span>Sat 1:00 PM</span>
        </div>

        <div class="game">
            <img src="/images/logos/broncos.png" alt="broncos.png" width="70px" height="70px">
            <span>Denver Broncos</span>
            at
            <img src="/images/logos/bengals.png" alt="bengals.png" width="70px" height="70px">
            <span>Cincinnati Bengals</span>
            <span>Sat 4:30 PM</span>
        </div>

        <div class="game">
            <img src="/images/logos/cardinals.png" alt="cardinals.png" width="70px" height="70px">
            <span>Arizona Cardinals</span>
            at
            <img src="/images/logos/rams.png" alt="rams.png" width="70px" height="70px">
            <span>Los Angeles Rams</span>
            <span>Sat 8:15 PM</span>
        </div>



    </section>

    <section>
        <h3>Rules</h3>

    </section>

    <section>
        <h3>Winners</h3>
        <div>
            <div class="winners">
                <span>Week 1</span>
                <span>Terri D</span>
            </div>
            <div class="winners">
                <span>Week 2</span>
                <span>John M</span>
            </div>

            <div class="winners">
                <span>Week 3</span>
                <span>Shannon B</span>
            </div>
            <div class="winners">
                <span>Week 4</span>
                <span>Terri D</span>
            </div>

            <div class="winners">
                <span>Week 5</span>
                <span>Lawrence C</span>
            </div>
            <div class="winners">
                <span>Week 6</span>
                <span>Darrin W and Luke C</span>
            </div>
            <div class="winners">
                <span>Week 7</span>
                <span>Bernard M</span>
            </div>
            <div class="winners">
                <span>Week 8</span>
                <span>Luke C</span>
            </div>
            <div class="winners">
                <span>Week 9</span>
                <span>John M and Lynn S</span>
            </div>
            <div class="winners">
                <span>Week 10</span>
                <span>Steve S</span>
            </div>
            <div class="winners">
                <span>Week 11</span>
                <span>Lawrence C</span>
            </div>
            <div class="winners">
                <span>Week 12</span>
                <span>Bernard M</span>
            </div>
            <div class="winners">
                <span>Week 13</span>
                <span>Mark C</span>
            </div>
            <div class="winners">
                <span>Week 14</span>
                <span> Bernard M</span>
            </div>
            <div class="winners">
                <span>Week 15</span>
                <span> Steve M </span>
            </div>
            <div class="winners">
                <span>Week 16</span>
                <span> -- </span>
            </div>
            <div class="winners">
                <span>Week 17</span>
                <span> -- </span>
            </div>
            <div class="winners">
                <span>Week 18</span>
                <span> -- </span>
            </div>
    </section>

    <script>
            const currentUser = @json($currentUser)

            const header = document.querySelector('.header')

            header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)



    </script>

</x-layout>
