<x-layout_dash_edit>
    <x-slot:heading>
        Edit Team
    </x-slot:heading>

    <h2>
        {{ $team->id }} {{ $team->city }} {{ $team->name }}
    </h2>

    <form method="POST" action="/dashboard/teams/{{ $team->id }}">
        @csrf
        @method('PATCH')
    <div class="container">
        <div class="">
            <div class="">
                <div class="">
                    <label for="city" class="">City</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="city"
                            id="city"
                            class=""

                            value="{{ $team->city  }}"
                            required>
                        </div>

                        @error('city')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="name" class="">name</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class=""

                            value="{{ $team->name  }}"
                            required>
                        </div>

                        @error('name')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="short_name" class="">Short Name</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="short_name"
                            id="short_name"
                            class=""

                            value="{{ $team->short_name  }}"
                            required>
                        </div>

                        @error('short_name')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="conference" class="">Conference</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="conference"
                            id="conference"
                            class=""
                            value="{{ $team->conference  }}"
                            required>
                        </div>

                        @error('conference')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="division" class="">Division</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="division"
                            id="division"
                            class=""
                            placeholder={{ $team->division }}
                            value="{{ $team->division  }}"
                            required>
                        </div>

                        @error('division')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>

                <div class="">
                    <label for="image" class="">Image</label>
                    <div class="">
                        <div class="">
                        <input
                            type="text"
                            name="image"
                            id="image"
                            class=""
                            placeholder={{ $team->image }}
                            value="{{ $team->image  }}"
                            required>
                        </div>

                        @error('image')
                        <p class="error-message"> {{ $message }} </p>
                        @enderror

                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <button form="delete-form" class="">Delete</button>
        </div>
        <div class="">
            <a href="/dashboard/teams/{{ $team->id }}" class="">Cancel</a>
            <div>
                <button type="submit" class="">Update</button>
            </div>
        </div>
    </div>
    </form>

    <form method="POST" action="/dashboard/teams/{{ $team->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')

    </form>

</x-layout_dash_edit>
