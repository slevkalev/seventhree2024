<x-layout_dash>
    <x-slot:heading>
        Picks - Dashboard
    </x-slot:heading>

    <h2>All Picks</h2>

    <br>
    <hr>

    <div class="container">


        @foreach ($picks as $pick)

            <a href="/dashboard/picks/{{ $pick['id'] }}/edit" class="">

                <div>
                    PickId: {{ $pick->id }}
                    User: {{ $pick->user}}
                    Game: {{ $pick->game }}
                    Pick: {{ $pick->pick }}
                    Points: {{ $pick->points }}
                </div>
            </a>


        @endforeach


    </div>
    <hr>

</x-layout_dash>
