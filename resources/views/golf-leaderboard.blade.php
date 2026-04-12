
<x-layout>
    <x-slot:heading>
        Golf Pool Leaderboard
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>




    @php
        $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['start'])->format('F d');
        $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['end'])->format('F d ');
    @endphp

<style>
  .message {
    opacity: 1;
    transition: opacity 1s ease;
    background: #ee0505;
    color: white;
    padding: 12px 16px;
    display: inline-block;
    border-radius: 6px;
    max-width: 20em;
    margin-bottom:1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
  }

  .message.fade-out {
    opacity: 0;
  }
</style>

<section>
    <h1>{{$tournament['tournament_name']}}</h1>
    <div>{{ $start_date }} to {{ $end_date }}</div>
    <br>
    <img src="{{ $tournament['image'] }}" alt="{{ $tournament['tournament_name'] }}" height="300px" width="300px">
    <br>
    <br>
    <div id="message" class="message">PGA Championship Pool starts May 11th -- Enter starting -- May 6th</div>
    <h3 class="inverted">Pool Leaderboard</h3>



    @php

        function calculateTotalScore($entry, $golfers) {
            $scores = [];
            $cutCount = 0;
            for ($i = 1; $i <= 6; $i++) {
                $selection = "selection{$i}";
                $golfer = $golfers->firstWhere('golfer_name', $entry->$selection);
                if ($golfer) {
                    if ($golfer->golfer_status != 999) {
                        $cutCount++;
                        $score = $golfer->r1 + $golfer->r2 + $golfer->r3 + $golfer->r4;
                        $scores[] = $score;
                    }
                }
            }
            if ($cutCount < 4) {
                return ['score' => 'DNQ', 'value' => 10000]; // Large value for sorting
            }
            sort($scores);
            return ['score' => array_sum(array_slice($scores, 0, 4)), 'value' => array_sum(array_slice($scores, 0, 4))];
        }

        $sortedEntries = $entries->map(function ($entry) use ($golfers) {
            $entry->total_score = calculateTotalScore($entry, $golfers);
            return $entry;
        })->sortBy(function ($entry) {
            return $entry->total_score['value'];
        });

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

    @foreach ($sortedEntries as $entry)
        <details class="entry-details">
            <summary class="entry-summary">
                <span class="entry-player-name">{{ $entry->player_name }}</span>
                <span class="entry-player-score">{{ formatScore($entry->total_score['score'])}}</span>
            </summary>

            <div class="entry-selections">
                @for ($i = 1; $i <= 6; $i++)
                    @php
                        $selection = "selection{$i}";
                        $golfer = $golfers->firstWhere('golfer_name', $entry->$selection);
                        $score = $golfer && $golfer->golfer_status != 999 ? ($golfer->r1 + $golfer->r2 + $golfer->r3 + $golfer->r4) : 'Cut';
                    @endphp

                  @if ($golfer)
                    <div class="selected">
                        <span class="selected-name">{{ $entry->$selection }}</span>
                        <span class="selected-score">{{ $golfer->golfer_status==0? formatScore($score) : 'Cut' }}</span>
                        <span class="selected-thru">{{ formatThru($golfer->round_status) }}</span>
                    </div>

                  @else
                      <span>{{$entry->selection}}</span>
                  @endif

                @endfor
            </div>
        </details>
    @endforeach

</section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.selected').forEach(entry => {
                const scoreEl = entry.querySelector('.selected-score');
                if (scoreEl && scoreEl.textContent.trim() === 'Cut') {
                    entry.classList.add('selected-cut');
                }
            });
        });
    </script>

    <script>
        const message = document.getElementById('message');

        setTimeout(() => {
            message.classList.add('fade-out');
        }, 5000);

        setTimeout(() => {
            message.remove();
        }, 6000);
    </script>

</x-layout>
