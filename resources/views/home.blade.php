<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <h1>2024 NFL Pool</h1>

    <section class="news">
        <h3>News</h3>

        <br>
        <i>Congratulations
            <br>


                <h2>Terri D</h2>


            Overall Winner Seventhree.ca NFL Pool 2024</i>
        <br>

        <p class="thanks">
            Thank you to everybody for participating in this years Seventhree.ca NFL Pool.  I appreciate your patience at the beginning of the season.  It took a little time for me to get the site up due to the passing of my dad.  I played picks for my dad each week and picked the Bills for max points every week.  I am happy the Bills had a great season and my dad's picks won one week.
        </p>
        <p class="thanks">
            I will be running the pool again next year and for the first time ever I will not be reprogramming the site again...maybe lol.  There will be changes, but mostly cosmetic.
        </p>

        <p class="thanks">
            Please remember to let friends know about the pool next year so we can grow the prizes next year.
        </p>

        <p class="thanks">
            For those of you interested Seventhree.ca Golf pools will start with the TPC Sawgrass March 13, 2025.
            I am building the site and will update this page once it is up.
        </p>

        {{-- <span>Week 18</span>
        <span>16 games this week</span>

        <h3>Saturday Games</h3>
        <div class="game">
                <img src="/images/logos/browns.png" alt="browns.png" width="70px" height="70px">
                <span>Cleveland Browns</span>
            at
                <img src="/images/logos/ravens.png" alt="ravens.png" width="70px" height="70px">
                <span>Baltimore Ravens</span>

                <span>Wed 4:30 PM</span>
        </div>

        <div class="game">
            <img src="/images/logos/bengals.png" alt="bengals.png" width="70px" height="70px">
            <span>Cincinnati Bengals</span>
            at
            <img src="/images/logos/steelers.png" alt="steelers.png" width="70px" height="70px">
            <span>Pittsburgh Steelers</span>
            <span>8:00 PM</span>
        </div> --}}

    </section>

    {{-- <section>
        <h3>Rules</h3>

    </section> --}}

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
                <span> Bernard M </span>
            </div>
            <div class="winners">
                <span>Week 17</span>
                <span> Ken D </span>
            </div>
            <div class="winners">
                <span>Week 18</span>
                <span> Barney S </span>
            </div>
    </section>

    <script>
            const currentUser = @json($currentUser)

            const header = document.querySelector('.header')

            header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)



    </script>

</x-layout>
