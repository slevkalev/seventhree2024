<x-layout_dash>
    <x-slot:heading>
        User Picks
    </x-slot:heading>
    <x-nav-block></x-nav-block>
    <x-nav-week-picks></x-nav-week-picks>

    <h2 class="pad1 center">Your Picks for Week {{ $week }} </h2>



    @foreach ($picks as $pick)

        @php
            $pickArray = $pick->toArray();
            $away = $pickArray['game']['away_team']['short_name'];
            $home = $pickArray['game']['home_team']['short_name'];
            $locked = $pickArray['game']['locked'];
        @endphp


            <div>


                @if($picks->isEmpty())
                    <div>You have not made any picks yet.</div>
                @else

                {{-- Pick Information --}}
                <div class="pickinfo">
                    <div class="pickinfo-game">{{$away}} @ {{$home}}</div>
                    <div class="pickinfo-div">

                    {{-- pick information if game has not started --}}
                    @if(!$locked)
                        {{-- edit button --}}
                        <a class="pickinfo-link" href="/user-picks/{{ $pick->id }}/edit">
                            <svg class="svg-edit" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                        </a>
                        <div class="pickinfo-details">

                            <span class="pickinfo-points">{{ $pick->points }}</span>
                            <img src="/images/logos/{{$pick->team->image}}" width="40px" height="40px" alt="{{$pick->team->image}}.png">
                            <span class="pickinfo-pick">{{ $pick->team->short_name}}</span>

                        </div>

                    @else
                        {{-- form if game has already started and marked locked --}}
                            <div class="pickinfo-space"></div>
                            <div class="pickinfo-details">

                                <span class="pickinfo-points">{{ $pick->points }}</span>
                                <img src="/images/logos/{{$pick->team->image}}" width="40px" height="40px" alt="{{$pick->team->image}}.png">
                                <span class="pickinfo-pick">{{ $pick->team->short_name}}</span>

                            </div>

                    @endif



                    @if (!$locked)

                    {{-- delete button --}}
                        <button form="delete-form-{{ $pick->id }}" class="x-button" onclick="return confirmDelete();">
                            <svg class="svg-delete" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                        </button>
                        <form method="POST" action="/user-picks/{{ $pick->id }}" id="delete-form-{{ $pick->id }}" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                    @endif

                </div>
            </div>

                @endif

            </div>

    @endforeach


    <div id="user-picks"></div>

    <script>
        function confirmDelete() {
            return confirm("Do you want to delete this pick?");
        }
    </script>


    <script>
        const currentUser = @json($user);

        const header = document.querySelector('.header')

        header.insertAdjacentHTML('afterend', `<div class="logged-user">${currentUser.first_name?? ""} ${currentUser.last_name?? ""}</div>`)


    </script>
</x-layout_dash>
