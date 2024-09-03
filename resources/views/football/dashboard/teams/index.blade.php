<x-layout_dash>
    <x-slot:heading>
        Dashboard - Teams
    </x-slot:heading>

    <h2>All Teams</h2>

    <a href="teams/create">Create Team</a>


    <div class="container">


        @foreach ($teams as $team)




            <a href="/dashboard/teams/{{ $team['id'] }}" class="">

                <div class="team">
                    <span class="team__id">{{ $team->id }}</span>
                    <span class="team__short">{{ $team->short_name}}</span>
                    <span Class="team__name">{{ $team->city}} {{ $team->name}}  </span>
                    <span class= "team__conference">{{ $team->conference }}  {{ $team->division }}</span>
                    <span class="team__image">{{ $team->image }}</span>
                </div>
            </a>


        @endforeach

        <div>

        </div>
    </div>



</x-layout_dash>
