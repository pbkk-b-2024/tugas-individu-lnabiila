<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-yellow-300">
            <h2 class="font-bold text-xl text-white leading-tight">
                {{ __('OUTLET | アウトレット') }}
            </h2>
            @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/outlet/create">
                <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add Outlet') }}
                </button>
            </a>
            @endif

            <form method="GET" class="w-1/2 max-w-sm">
                <div class="flex items-center rounded-full">
                    <input type="text" name="search" id="search"
                        class="flex-grow bg-transparent text-white placeholder-white border-none focus:ring-0 focus:outline-none"
                        placeholder="Search for outlet ..." value="{{ request()->get('search') }}">
                    <button type="submit"
                        class="ml-2 text-white hover:bg-orange-400 font-semibold py-1 px-4 rounded-full transition duration-200 ease-in-out">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </x-slot>

    @if (session('status') == 'success')
    <div class="flex justify-center items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 relative" role="alert">
        <svg class="absolute top-0 right-0 m-2 cursor-pointer" width="18" height="18" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16" onclick="this.parentElement.style.display='none'">
            <path d="M3.646 3.646a.5.5 0 0 1 .708 0L8 7.293l3.646-3.647a.5.5 0 0 1 .708 0 .5.5 0 0 1 0 .708L8.707 8l3.647 3.646a.5.5 0 0 1 0 .708a.5.5 0 0 1-.708 0L8 8.707l-3.646 3.647a.5.5 0 0 1-.708 0a.5.5 0 0 1 0-.708L7.293 8 3.646 4.354a.5.5 0 0 1 0-.708z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-large">Success!</span> {{ session('message') }}
        </div>
    </div>
    @endif

    <br>
    <div class="w-full flex justify-center">
    <div class="w-3/4 mx-1">
        <br>
        <div id="outletcontainer" class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-6">
            @foreach($outlets as $outlet)
            <div class="outletclass border-2 border-red-500 rounded-lg shadow-lg">
                <div class="bg-white p-4 rounded-lg h-full flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold mb-2 text-red-600">{{ $outlet->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $outlet->address }}</p>
                        <p class="text-sm text-gray-500">Open Hour: {{ $outlet->open_hour }} - {{ $outlet->close_hour }}</p>
                        @php
                            $current_time = \Carbon\Carbon::now();
                            $open_time = \Carbon\Carbon::createFromFormat('H:i:s', $outlet->open_hour);
                            $close_time = \Carbon\Carbon::createFromFormat('H:i:s', $outlet->close_hour);
                        @endphp
                        @if ($current_time->between($open_time, $close_time)) 
                            <p class="text-green-500 font-semibold mb-4">OPEN</p>
                        @else 
                            <p class="text-red-500 font-semibold mb-4">CLOSE</p>
                        @endif
                    </div>
                    <div class="flex items-center">
                        @if(Auth::check() && Auth::user()->role == 'admin')
                        <a href="/outlet/{{$outlet->id}}/edit">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700">
                                {{ __('Edit') }}
                            </button>
                        </a>
                        <form method="POST" action="/outlet/{{ $outlet->id }}" onsubmit="return confirm('Are you sure you want to delete this menu outlet?');">
                            @csrf
                            @method('DELETE')
                            <button type=" submit" class="ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Delete') }}
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
    </div>
</div>
</x-app-layout>