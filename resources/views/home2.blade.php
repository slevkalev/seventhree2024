<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <main>

        <section>
            <h1>
                Welcome to Seventhree.ca NFL POOL 2025
            </h1>


            <div class="game">

                <a href="/register" class="register-btn">Register Now</a>

                <h3>Pool Structure</h3>

                <ul  class="rules-list">
                    <li>This is a confidence pool for the 2025 NFL Regular Season</li>
                    <li>All participants submit picks for all games each week</li>
                    <li>A pick is a team and a point value</li>
                    <li>The max point value is based on the number of games in the week</li>
                    <li>If there are 16 games in a week you will have 16 picks valued 1 to 16.  <i>You cannot have 2 picks with the same value in the week</i></li>
                    <li><b>Weekly Pick Deadline </b>- All picks need to be submitted by Sunday 1:00 PM EST</li>
                    <li>NOTE:  There are games on Thursdays every week.  There are a few Friday, Saturday and Sunday Morning games during the season.</li>
                    <li>Weekly Total High score wins $$</li>
                    <li>Season Total High Score wins $$</li>
                    <li>Entry cost $75</li>
                    <li>Etransfer to jsnelg@gmail.com before the season starts</li>
                    <li>Deadline for entry is Sept 4th 8:00 PM</li>
                    <li>Payout amounts will depend on number of entries</li>
                    <li>Payout table will be available after the season starts</li>
                </ul>

            </div>
        </section>


    <section class="news">
        <h3>News</h3>

        <div>
            <h4>Week 1 NFL PooL starts September 4th</h4>

            <div class="game">
                <img src="/images/logos/cowboys.png" alt="cowboys.png" width="70px" height="70px">
                <span>Dallas Cowboys</span>
            at
                <img src="/images/logos/eagles.png" alt="eagles.png" width="70px" height="70px">
                <span>Philadelphia Eagles</span>

                <span>Wed 8:20 PM</span>
        </div>

        {{-- </div> --}}
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


    <section>
        <h3>Winners</h3>
        <div class="game">
            <div class="winners">
                <span>Week 1</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 2</span>
                <span></span>
            </div>

            <div class="winners">
                <span>Week 3</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 4</span>
                <span></span>
            </div>

            <div class="winners">
                <span>Week 5</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 6</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 7</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 8</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 9</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 10</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 11</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 12</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 13</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 14</span>
                <span></span>
            </div>
            <div class="winners">
                <span>Week 15</span>
                <span> </span>
            </div>
            <div class="winners">
                <span>Week 16</span>
                <span> </span>
            </div>
            <div class="winners">
                <span>Week 17</span>
                <span> </span>
            </div>
            <div class="winners">
                <span>Week 18</span>
                <span> </span>
            </div>
    </section>

</main>

    <script>
            const currentUser = @json($currentUser)

            const header = document.querySelector('.header')

            header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)



    </script>

</x-layout>
