<x-layout>
    <x-slot:heading>
        Golfer Scores Admin
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>

    @php

        function formatScore($score){
            if($score > 0) return "+".$score;
            if($score == 0) return "E";
            return $score;
        }

        function formatThru($thru, $active){
            if($active==0) return "";
            if($thru==0) return "--";
            if($thru>0 && $thru<19) return $thru;
            if($thru>=19) return "F";
        }

    @endphp

    <h1>Golfer Scores Admin</h1>
    @foreach ($unique_golfers as $active_golfer)

        <div>{{$active_golfer}}</div>



@endforeach

        <div>Golfers selected: {{$number_of}}</div>
        <div>Golfers active: {{$number_active}}</div>


    <input class="golfer-search" type="text" placeholder="Search">



    <div class="golfer-list">



    @foreach ($golfers as $golfer )

        @php
            $cutWeight= $golfer->golfer_status == 0? 0:100;

            $score = $golfer->r1 + $golfer->r2 + $golfer->r3 + $golfer->r4 + $cutWeight
        @endphp

        <a href="golf-scores/{{ $golfer->id}}/edit" class="golfer-link">
            <div class="golfer-info" style= "color: {{$golfer->active == 1? 'limegreen': 'black' }}">
                <div class="golfer-info_primary">
                    <span class="golfer-name">{{ $golfer->golfer_name }}</span>
                    <div>
                        <span class="golfer-score">{{$golfer->golfer_status == 0 ? formatScore($score) : "Cut" }}</span>
                        <span>{{ formatThru($golfer->round_status==null? 0: $golfer->round_status, $golfer->active) }}</span>
                    </div>
                </div>
                <div class="golfer-info_secondary">
                    <span>R1: {{ formatScore($golfer->r1) }}</span>
                    <span>R2: {{ formatScore($golfer->r2) }}</span>
                    <span>R3: {{ formatScore($golfer->r3) }}</span>
                    <span>R4: {{ formatScore($golfer->r4) }}</span>
                </div>
                <div class="golfer-info_third">
                    <span>Active: {{ $golfer->active == 1? "yes" : "no" }}</span>
                    <span>Status: {{ $golfer->golfer_status==0? "Made":"Cut" }}</span>
                </div>
            </div>
        </a>

    @endforeach
    </div>
    <script>

                // Select all golfer links
        const golferLinks = document.querySelectorAll('.golfer-link');

        // Convert NodeList to an array and sort it by score
        const sortedGolferLinks = Array.from(golferLinks).sort((a, b) => {
            // Extract scores from the .golfer-score span
            const scoreA = parseInt(a.querySelector('.golfer-score').textContent);
            const scoreB = parseInt(b.querySelector('.golfer-score').textContent);

            // Sort in ascending order (lower score is better)
            return scoreA - scoreB;
        });

        // Clear the current list of golfers
        const golferList = document.querySelector('.golfer-list');
        golferList.innerHTML = '';

        // Append sorted golfers back to the list
        sortedGolferLinks.forEach(link => golferList.appendChild(link));


        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('.golfer-search');
            const golferLinks = document.querySelectorAll('.golfer-link');
            const scores = document.querySelectorAll(".golfer-score");

            scores.forEach(score=>{
                const value = parseInt(score.innerText)
                if(value === 0){ score.innerText = "E"}
                if(value > 0) { score.innerText = `+${value}`}
            })

            searchInput.addEventListener('input', filterGolfers);

            function filterGolfers() {
                const searchTerm = searchInput.value.toLowerCase();

                golferLinks.forEach(link => {
                    const golferName = link.querySelector('.golfer-name').textContent.toLowerCase();
                    if (golferName.includes(searchTerm)) {
                        link.style.display = 'block'; // Show the link
                    } else {
                        link.style.display = 'none';   // Hide the link
                    }
                });
            }
        });


    </script>
</x-layout>
