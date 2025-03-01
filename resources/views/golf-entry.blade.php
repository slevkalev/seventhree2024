<x-layout>
    <x-slot:heading>
        Golf Entry Form
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>

    <h1>{{ $tournament['tournament_name']}}</h1>


    @php
        $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['start'])->format('F d');
        $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['end'])->format('F d ');
    @endphp

    <div>{{ $start_date }} to {{ $end_date }}</div>
    <br>

    <img src="{{ $tournament['image'] }}" alt="{{ $tournament['tournament_name'] }}" height="300px" width="300px">
    <br>
    <br>
    <h2>Golf Pool Entry Form</h2>

    <form method="POST" action="/golf-entry">
        @csrf

        <x-form-field>
            <x-form-label for="player_name">Full Name</x-form-label>
            <div class="input-div">
                <x-form-input name="player_name" id="player_name" type="text" placeholder="Full name" :value="old('player_name')" required />

                <x-form-error name="player_name" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="email">E-mail</x-form-label>
            <div class="input-div">
                <x-form-input name="email" id="email" type="text" placeholder="E-mail" :value="old('email')" required />

                <x-form-error name="email" />

            </div>
        </x-form-field>

        <x-form-field>
            <x-form-label for="phone">Phone number</x-form-label>
            <div class="input-div">
                <x-form-input name="phone" id="phone" type="text" placeholder="Phone #" :value="old('phone')" required />

                <x-form-error name="phone" />

            </div>
        </x-form-field>


        <h3>Select Golfers</h3>
        <br>

        @foreach($field as $index => $golfer)
            <div class="form-check">
                <input class="checkbox" name="golfers[]" type="checkbox" id="golfer{{ $index }}" value="{{ $golfer }}">
                <label for="golfer{{ $index }}">{{ $golfer }}</label>
            </div>
        @endforeach


        <h3>Your Selections</h3>
        <div class="selections"></div>

        <button type="submit" disabled>Submit</button>

    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
       const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const selected = document.querySelector(".selections")
        const submitBtn = document.querySelector("button")

        // Initialize a counter to keep track of the number of checked checkboxes
        let checkedCount = 0;
        // Initialize the values array of selected golfers
        let valueList = []
        // Add a change event listener to each checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {

                if (checkbox.checked) {
                //add name to the value list
                    valueList.push(checkbox.value)
                    // Increment the counter
                    checkedCount++;

                    if (checkedCount === 6) {
                        // If the count reaches 6, disable unchecked checkboxes
                        checkboxes.forEach(cb => {
                            if (!cb.checked) {
                                cb.disabled = true;
                            }
                        });
                        document.querySelector("button").scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                        //enable the submit button if all 6 golfers have been selected
                        submitBtn.disabled = false
                    }
                } else {

                    const index = valueList.indexOf(checkbox.value);
                    if (index !== -1) {
                        valueList.splice(index, 1); // Remove value from the array when unchecked
                    }
                    // If the checkbox is unchecked, decrement the counter
                    checkedCount--;

                    if (checkedCount < 6) {
                    // If the count is less than 6, enable all unchecked checkboxes
                        checkboxes.forEach(cb => {
                        if (!cb.checked) {
                            cb.disabled = false;
                        }
                        });
                    }
                }

                console.log(valueList)
                selected.innerHTML = ""
                valueList.forEach(value => {
                    selected.innerHTML+=`<p>${value}</p>`
                })
            });
        });


    </script>

</x-layout>

