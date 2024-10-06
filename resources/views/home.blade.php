<x-layout>
    <x-slot:heading>
        Home
    </x-slot:heading>


    <x-nav-block></x-nav-block>

    <h1>2024 NFL Pool</h1>

    <section>
        <h3>News</h3>
        <p>Week 1 - NFL 2024 Regular Season</p>
        <p></p>
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
