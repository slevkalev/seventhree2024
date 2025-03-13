<x-layout_dash_edit>
    <x-slot:heading>
        Golfer Score Edit
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>




        <h1>Golfer Score Edit</h1>




        <div class="result">
{{--
        <div class="round-selector">
            <button onclick="setRound(1)">Round 1</button>
            <button onclick="setRound(2)">Round 2</button>
            <button onclick="setRound(3)">Round 3</button>
            <button onclick="setRound(4)">Round 4</button>
        </div> --}}

        @php
            $score = $golfer->r1 + $golfer->r2 + $golfer->r3 + $golfer->r4
        @endphp

        <form class="border1" id="golfer-form" method="POST" action="/golf-scores/{{ $golfer->id }}">
            @csrf
            @method('PATCH')

            <div class="golfer-record">
                <input type="hidden" name="id" value="{{ $golfer->id }}">

                <div class="name-score">
                    <h4>{{ $golfer->golfer_name }}</h4>
                    <h4 class="score">{{ $score }}</h4>
                </div>
                <input type="hidden" name="golfer_name" value="{{ $golfer->golfer_name }}">

                <div class="rdiv">
                    <label for="R1">R1</label>
                    <input type="number" id="R1" name="r1" value="{{$golfer->r1}}">
                </div>

                <div class="rdiv">
                    <label for="R2">R2</label>
                    <input type="number" id="R2" name="r2" value="{{$golfer->r2}}">
                </div>

                <div class="rdiv">
                    <label for="R3">R3</label>
                    <input type="number" id="R3" name="r3" value="{{$golfer->r3}}">
                </div>

                <div class="rdiv">
                    <label for="R4">R4</label>
                    <input type="number" id="R4" name="r4" value="{{$golfer->r4}}">
                </div>

                <div>
                    <label for="thru">Thru</label>
                    <input type="text" id="thru" name="round_status" value="{{$golfer->round_status}}">
                </div>

                <div>
                    <label for="status">Status</label>
                    <input type="number" id="status" name="golfer_status" value="{{$golfer->golfer_status}}">
                </div>

                <div>
                    <label for="active">Active</label>
                    <input type="number" id="active" name="active" value="{{$golfer->active}}">
                </div>

                <button>submit</button>

            </div>



        </form>

    </div>

    <script>
        function setRound(round){
            document.cookie = `currentRound=${round}; max-age=86400; path=/`;
            // const currentRound = getCookie('currentRound')
            console.log(document.cookie)
        }

        function updateRoundDisplay(){
            const roundDivs = document.querySelectorAll(".rdiv")
            const currentRound = getCookie('currentRound')
            console.log(roundDivs[currentRound])
        }

    </script>


</x-layout_dash_edit>
