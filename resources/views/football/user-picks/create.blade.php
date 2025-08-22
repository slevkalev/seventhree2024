<x-layout_dash>
    <x-slot:heading>
        Make Pick
    </x-slot:heading>

<section>

    <h1 class="center pad1">Pick for Game {{ $game->id }}</h1>

    <form class="border1" id="pick-form" method="POST" action="/user-picks">
        @csrf

        <div class="pick-info">
            <label for="away_team">
                <img class="team-logo" src="/images/logos/{{ $game->awayTeam()->pluck('image')->first()}}" alt="{{ $game->awayTeam()->pluck('image')->first()}}">
                <span class="team-shortname">{{ $game->awayTeam()->pluck('short_name')->first() }}</span>
            </label>
            <input class="hidden-checkbox" type="checkbox" id="away_team" name="pick" value="{{ $game->awayTeam()->pluck('id')->first() }}" />

            <p>@</p>

            <label for="home_team">
                <img class="team-logo" src="/images/logos/{{ $game->homeTeam()->pluck('image')->first()}}" alt="{{ $game->homeTeam()->pluck('image')->first()}}">
                <span class="team-shortname">{{ $game->homeTeam()->pluck('short_name')->first() }}</span>
            </label>
            <input class="hidden-checkbox" type="checkbox" id="home_team" name="pick" value="{{ $game->homeTeam()->pluck('id')->first() }}" />
        </div>

        <p>You Picked</p>

        <div class="pick-image"></div>
        <div class="wager-select">
            <label for="points-select">Wager</label>
            <select name="points" id="points-select">
                <option value="">Choose wager</option>

            </select>

            <input type="hidden" name="user" value="{{ $user->id }}" >
            <input type="hidden" name="game" value="{{ $game->id }}">
            <x-form-button>Submit</x-form-button>
        </div>
    </form>

    <div class="bottom-div">
        <a href="/games" class="cancel-button">Cancel</a>
    </div>

</section>

    <script>
        const homeTeamCheckbox = document.getElementById('home_team');
        const awayTeamCheckbox = document.getElementById('away_team');
        const pickImage = document.querySelector('.pick-image')


        homeTeamCheckbox.addEventListener('change', function() {
            if (this.checked) {
                awayTeamCheckbox.checked = false;
                pickImage.innerHTML = ""
                const awayImage = document.createElement('img');
                awayImage.src = "/images/logos/{{ $game->homeTeam()->pluck('image')->first()}}"
                awayImage.classList.add('team-logo')
                pickImage.appendChild(awayImage)


            }
        });

        awayTeamCheckbox.addEventListener('change', function() {
            if (this.checked) {
                homeTeamCheckbox.checked = false;
                pickImage.innerHTML = ""
                const homeImage = document.createElement('img');
                homeImage.src = "/images/logos/{{ $game->awayTeam()->pluck('image')->first()}}"
                homeImage.classList.add('team-logo')
                pickImage.appendChild(homeImage)
            }
        });




        //SELECT OPTIONS
        function createSelectOptions(num, excludeArray = []) {
            // Check if the input is a positive integer
            if (!Number.isInteger(num) || num <= 0) {
                return "<option value=''>Please provide a positive integer</option>";
            }

            // Create a Set from the exclude array for efficient lookup
            const excludeSet = new Set(excludeArray);

            // Create an array, filter out excluded numbers, then map to option tags
            return Array.from({ length: num }, (_, index) => index + 1)
                .filter(number => !excludeSet.has(number))
                .map(number => `<option value="${number}">${number}</option>`)
                .join('\n');
        }

        const selectElement = document.getElementById('points-select');


        selectElement.insertAdjacentHTML('beforeend', `${createSelectOptions({{ $numberOfGames }}, {{ $picked }})}`);

    </script>
    <script>
        //display logged in user under the header
        const currentUser = @json($user);

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)

    </script>
</x-layout_dash>
