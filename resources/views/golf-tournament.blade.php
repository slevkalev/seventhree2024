<x-layout>
    <x-slot:heading>
        Golf Tournament Info
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>


    @php
        $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['start'])->format('F d');
        $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['end'])->format('F d ');
    @endphp

    <section>
    <h1>{{$tournament['tournament_name']}}</h1>
    <div>{{ $start_date }} to {{ $end_date }}</div>
    <br>
    <img src="{{ $tournament['image'] }}" alt="{{ $tournament['tournament_name'] }}" height="300px" width="300px">
    <br>
    <br>
    <h3 class="inverted">Tournament Leaderboard</h3>




    @php
        function totalScore($golfer){
            $score = $golfer->r1 + $golfer->r2 + $golfer->r3 + $golfer->r4;
            return $score;
        }

        function formatScore($score){
            if($score > 0) return "+".$score;
            if($score == 0) return "E";
            return $score;
        }

        function formatThru($thru){
            if($thru==0) return "";
            if($thru>0 && $thru<19) return $thru;
            if($thru>=19) return "F";
        }
    @endphp

    <div class="tournament-leaderboard">

        @foreach ($golfers as $golfer)

        <details class="golfer-details">
            <summary class="golfer-summary">
                <span class="tournament-golfer">{{ $golfer->golfer_name }}</span>
                <span class="total-score">{{ formatScore(totalScore($golfer)) }}</span>
                <span class="thru">{{ formatThru($golfer->round_status) }}</span>
            </summary>
                <div class="golfer-tournament-info">
                    <span class="round">R1:</span>
                    <span class="r1">{{ formatScore($golfer->r1) }}</span>
                </div>
                <div class="golfer-tournament-info">
                    <span class="round">R2:</span>
                    <span class="r2">{{ formatScore($golfer->r2) }}</span>
                </div>
                <div class="golfer-tournament-info">
                    <span class="round">R3:</span>
                    <span class="r3">{{ formatScore($golfer->r3) }}</span>
                </div>
                <div class="golfer-tournament-info">
                    <span class="round">R4:</span>
                    <span class="r4">{{ formatScore($golfer->r4) }}</span>
                </div>
                <div class="golfer-tournament-info">
                    <span class="round">Status:</span>
                    <span class="golfer-status">{{ $golfer->golfer_status }}</span>
                </div>
        </details>

        @endforeach

    </div>
    </section>

    <script>
        function sortGolfersByScore() {
            const container = document.querySelector('.tournament-leaderboard'); // Adjust this selector as needed
            const golferDetails = Array.from(container.querySelectorAll('.golfer-details'));

            golferDetails.sort((a, b) => {
                const scoreA = parseScore(a.querySelector('.total-score').textContent);
                const scoreB = parseScore(b.querySelector('.total-score').textContent);
                return scoreA - scoreB;
            });

            golferDetails.forEach(detail => container.appendChild(detail));
        }

        function parseScore(score) {
            if (score === 'E') return 0;
            return parseInt(score, 10) || 0;
        }

        // Call the function to sort
        sortGolfersByScore();

    </script>

</x-layout>
