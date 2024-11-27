<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <h1>2024 NFL Pool</h1>

    <section>
        <h3>News</h3>
        <p>Week 13 - NFL 2024 Regular Season</p>
        <h5>Thanksgiving Day Schedule</h5>
        <div class="game-team">
            <span class="time">12:30 PM</span>
            <div class="game-team">
                <img src="./images/logos/bears.png" alt="bears.png" width="40" height="40">
                <span>Chicago Bears</span>
                <span>at</span>
                <img src="./images/logos/lions.png" alt="lions.png" width="40" height="40">
                <span>Detroit Lions</span>
            </div>
        </div>

        <div class="game-team m-ba">
            <span class="time">4:30 PM</span>
            <div class="game-team">
                <img src="./images/logos/giants.png" alt="giants.png" width="40" height="40">
                <span>NY Giants</span>
                <span>at</span>
                <img src="./images/logos/cowboys.png" alt="cowboys.png" width="40" height="40">
                <span>Dallas Cowboys</span>
            </div>
        </div>

        <div class="game-team m-ba">
            <span class="time">8:20 PM</span>
            <div class="game-team">
                <img src="./images/logos/dolphins.png" alt="dolphins.png" width="40" height="40">
                <span>Miami Dolphins</span>
                <span>at</span>
                <img src="./images/logos/packers.png" alt="packers.png" width="40" height="40">
                <span>Green Bay Packers</span>
            </div>
        </div>
        <h5>Black Friday Schedule</h5>

        <div class="game-team m-ba">
            <span class="time">3:00 PM</span>
            <div class="game-team">
                <img src="./images/logos/raiders.png" alt="raiders.png" width="40" height="40">
                <span>Las Vegas Raiders</span>
                <span>at</span>
                <img src="./images/logos/chiefs.png" alt="chiefs.png" width="40" height="40">
                <span>Kansas City Chiefs</span>
            </div>
        </div>
    </section>

    <section>
        <h3>Rules</h3>

    </section>

    <section>
        <h3>Winners</h3>
        <div>
            <div>
                <span>Week 1</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 2</span>
                <span> -- </span>
            </div>

            <div>
                <span>Week 3</span>
                <span> -- </span>
            <div>

                <span>Week 4</span>
                <span> -- </span>
            </div>

            <div>
                <span>Week 5</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 6</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 7</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 8</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 9</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 10</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 11</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 12</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 13</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 14</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 15</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 16</span>
                <span> -- </span>
            </div>
            <div>
                <span>Week 17</span>
                <span> -- </span>
            </div>
            <div>
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
