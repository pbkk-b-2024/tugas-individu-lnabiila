<x-guest-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center">
        {{ __('Edit Outlet') }}
    </h2>

    <form action="/outlet/{{$outlet->id}}" method="POST">
        @csrf
        @method('put')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$outlet->name}}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <textarea id="address" name="address" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">{{$outlet->address}}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="open_hour" :value="__('Open Hour')" />
            <x-text-input id="open_hour" class="block mt-1 w-full" type="text" name="open_hour" value="{{$outlet->open_hour}}" required autofocus autocomplete="open_hour" />
            <x-input-error :messages="$errors->get('open_hour')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="close_hour" :value="__('Close Hour')" />
            <x-text-input id="close_hour" class="block mt-1 w-full" type="text" name="close_hour" value="{{$outlet->close_hour}}" required autofocus autocomplete="close_hour" />
            <x-input-error :messages="$errors->get('close_hour')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a href="./">
                <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Back') }}
                </button>
            </a>
            <button type=" submit" class="ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Edit Outlet') }}
            </button>
    </form>
</x-guest-layout>