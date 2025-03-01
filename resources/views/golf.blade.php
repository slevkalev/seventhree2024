<x-layout>
    <x-slot:heading>
        Golf Home
    </x-slot:heading>

    <x-nav-block-golf></x-nav-block-golf>

    <h1>Golf Pools 2025</h1>

    <p>Seventhree.ca Golf Pools are back.</p>

    <p>This year there are 5 events on the schedule</p>


    <section class="pools">

        <h3>Schedule</h3>

        @foreach ($tournaments as $tournament)

        @php

            $start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['start'])->format('F d');
            $end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $tournament['end'])->format('F d ');

        @endphp

        <div class="schedule">

            <img class="golf-logo" src="{{ $tournament['image']}}" alt=" The Players Championship" height="150px" width="150px">
            <div class="schedule-info">
                <span>{{ $tournament['tournament_name'] }}</span>
                <span>{{ $start_date }} to {{ $end_date }}</span>
            </div>

        </div>

        @endforeach



    </section>

    <section>
        <details class="golf-details">
            <summary class="golf-summary">Pool Rules</summary>
            <ul style="margin-left:2em;">
                 <li>Each entry is $10</li>
                 <li>Payment through e-transfer to jsnelg@gmail.com</li>
                 <li>Multiple entries is encouraged</li>
                 <li>Each entry consists of of 6 golfers</li>
                 <li>To have a valid score 4 golfers have to make the cut and complete all 4 rounds</li>
                 <li>Entry score will be the combination of the 4 best scores by selected golfers who make the cut and complete all 4 rounds</li>
                 <li>Entries must be received by midnight the night before the tournament starts.</li>
                 <li>In case of a player withdraws from the tournament prior to their tee time.
                      <ol style="margin-left:2em;">
                           <li>A substitute for this golfer can be requested by texting me.</li>
                           <li>The requested golfer can be picked from the field as long as they have not teed off</li>
                           <li>If a request has not been made in time the entry will continue with the remaining golfers</li>
                      </ol>
                 </li>
            </ul>
       </details>
       <details class="golf-details">
            <summary class="golf-summary">Payouts</summary>
            <ul style="margin-left:2em;">
                 <li>Payout breakdown is dependent on the number of entries</li>
                 <li>24 entries or less -- winner take all</li>
                 <li>25-34 entries --  2nd = $50, 1st = the balance</li>
                 <li>35-59 entries -- 2nd = $100, 3rd = $50, 1st = the balance</li>
                 <li>60 and up -- 2nd = $150, 3rd = $100, 4th = $50, 1st = the balance</li>
            </ul>
       </details>
  </section>




</x-layout>
