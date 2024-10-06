<x-layout_dash>
    <x-slot:heading>
        Edit Pick
    </x-slot:heading>

    <h1 class="center pad1">Edit Pick for Game {{  $pick->game }} </h1>

    <form class="border1" id="pick-form" method="POST" action="/user-picks/{{ $pick->id }}">
        @csrf
        @method('PATCH')

        <div class="pick-info">
            <label for="away_team">
                <img class="team-logo" src="/images/logos/{{ $game->awayTeam()->pluck('image')->first() }}" alt="">
                <span class="team-shortname">{{ $game->awayTeam()->pluck('short_name')->first() }}</span>
            </label>
            <input class="hidden-checkbox" type="checkbox" id="away_team" name="pick" value="{{ $game->away_team }}" />

            <p>@</p>

            <label for="home_team">
                <img class="team-logo" src="/images/logos/{{ $game->homeTeam()->pluck('image')->first() }}" alt="">
                <span class="team-shortname">{{ $game->homeTeam()->pluck('short_name')->first() }}</span>
            </label>
            <input class="hidden-checkbox" type="checkbox" id="home_team" name="pick" value="{{ $game->home_team }}" />
        </div>

        <p>You Picked</p>

        <div class="pick-image"></div>
        <div class="wager-select">
            <label for="points-select">Wager</label>
            <select name="points" id="points-select">
                <option value="">Choose wager</option>
                <option value="{{ $pick->points }}" selected>{{ $pick->points }}</option>

            </select>

            <input type="hidden" name="user" value="{{ $user->id }}" >
            <input type="hidden" name="game" value="{{ $pick->game }}">

            @can ('edit-pick', $pick)

            <x-form-button>Submit</x-form-button>

            @endcan

        </div>
    </form>

    <div class="bottom-div">

        @can ('edit-pick', $pick)

        <button form="delete-form" class="delete-button">Delete</button>

        @endcan

        <a href="/user-picks" class="cancel-button">Cancel</a>

    </div>

    <form method="POST" action="/user-picks/{{ $pick->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')

    </form>
    {{-- JAVASCRIPT --}}
    <script>
        const homeTeamCheckbox = document.getElementById('home_team');
        const awayTeamCheckbox = document.getElementById('away_team');
        const pickImage = document.querySelector('.pick-image')



        homeTeamCheckbox.addEventListener('change', function() {
            if (this.checked) {
                awayTeamCheckbox.checked = false;
                pickImage.innerHTML = ""
                const awayImage = document.createElement('img');
                awayImage.src = "/images/logos/{{ $game->homeTeam()->pluck('image')->first() }}"
                awayImage.classList.add('team-logo')
                pickImage.appendChild(awayImage)


            }
        });

        awayTeamCheckbox.addEventListener('change', function() {
            if (this.checked) {
                homeTeamCheckbox.checked = false;
                pickImage.innerHTML = ""
                const homeImage = document.createElement('img');
                homeImage.src = "/images/logos/{{ $game->awayTeam()->pluck('image')->first() }}"
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

        const pickedList = {{ $picked }}
        pickedList.unshift({{$pick->points}})

        selectElement.insertAdjacentHTML('beforeend', `${createSelectOptions({{ $numberOfGames }}, {{ $picked }})}`);

    </script>
</x-layout_dash>
