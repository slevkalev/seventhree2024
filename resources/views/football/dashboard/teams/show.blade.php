<x-layout_dash>
    <x-slot:heading>
        Team
    </x-slot:heading>

    <h2 class="font-bold text-lg">Team# {{ $team->id }}</h2>
    <p>
        {{ $team->city }}
    </p>

    <p>
        {{ $team->name}}
    </p>

    {{-- @can('edit-team', $team) --}}
    <p class="mt-6">
        <a href="/dashboard/teams/{{ $team->id }}/edit">Edit Team</a>
    </p>
    {{-- @endcan --}}

</x-layout_dash>
