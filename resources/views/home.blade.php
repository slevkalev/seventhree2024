<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <h1>2024 NFL Pool</h1>

    <section class="news">
        <h3>News</h3>

        <span>Week 16</span>
        <span>16 games this week</span>
        <h3>Saturday Games This Week</h3>
        <div class="game">
            <img src="/images/logos/texans.png" alt="texans.png">
            <span>Houston Texans</span>
            at
            <img src="/images/logos/chiefs.png" alt="chiefs.png">
            <span>Kansas City Chiefs</span>
            <span>Sat 1:00 PM</span>
        </div>

        <div class="game">
            <img src="/images/logos/steelers.png" alt="steelers.png">
            <span>Pittspurgh Steelers</span>
            at
            <img src="/images/logos/ravens.png" alt="ravens.png">
            <span>Baltimore Ravens</span>
            <span>Sat 4:30 PM</span>
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
