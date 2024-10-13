<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight">
                {{ __('CURRENT PROMOTION | プローモー ライト ナウ') }}
            </h2>
            @if(Auth::check() && Auth::user()->role == 'admin')
            <a href="/promo/create">
                <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add Promo') }}
                </button>
            </a>
            @endif
        </div>
    </x-slot>
    @php
    $activepromo = $promos->where('is_active', 1)->first();
    $notactivepromos = $promos->where('is_active', 0)->where('start_time', '>', now());
    @endphp
    <div class="flex flex-wrap justify-center">
        <div class="w-full p-4">
            @if($activepromo !== null && $activepromo->count() > 0)
            <div class="w-full p-4" style="margin-bottom: 10px">
                <div class="bg-white shadow-lg rounded-lg p-4 mb-8" style="display: flex; flex-direction: column; overflow: hidden;">
                    <h2 class="font-bold text-xl text-gray-700 leading-tight p-4">{{$activepromo->name}} </h2>
                    @php
                    $activepromomenus = $promomenus->where('promo_id', $activepromo->id);
                    @endphp
                    <div class="flex flex-wrap">
                        @foreach($activepromomenus as $activepromomenu)
                        <div class="lg:w-1/4 md:w-1/3 sm:w-full p-4">
                            <div class=" bg-white shadow-lg rounded-lg p-4" style="display: flex; flex-direction: column; height: 280px; overflow: hidden;">
                                <div class="flex" style="height: 100%; overflow: hidden;">
                                    <img src="{{asset('storage/photo/'.$activepromomenu->menu->photo)}}" class="h-full w-auto object-cover rounded-lg" style="max-height: 100%;">
                                </div>
                                <div class="pt-4" style="height: 100%; overflow: hidden;">
                                    <h3 class="text-lg font-semibold mb-1">{{$activepromomenu->menu->name}}</h3>
                                    @if($activepromomenu->menu->price == $activepromomenu->menu->original_price)
                                    <p class="text-gray-950 my-4">Rp {{ number_format($activepromomenu->menu->price, 0, ',', '.') }}</p>
                                    @else
                                    <div class="flex">
                                        <p class="text-gray-950 my-4 mr-2 line-through">Rp {{ number_format($activepromomenu->menu->original_price, 0, ',', '.') }}</p>
                                        <p class="text-gray-950 my-4">Rp {{ number_format($activepromomenu->menu->price, 0, ',', '.') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-between p-4">
                        <h2 class="font-semibold text-lg text-gray-800 leading-tight"> Promo will end at: {{$activepromo->end_day}}</h2>
                        <a href="/menu">
                            <x-primary-button class="bg-red-600">
                                {{ __('Order Menu') }}
                            </x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @if ($notactivepromos !== null && $notactivepromos->count() > 0)
            <div class="w-full p-4" style="margin-bottom: 30px">
                <div class="bg-white shadow-lg rounded-lg p-4 mb-8" style="display: flex; flex-direction: column; overflow: hidden;">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-2 p-4">Upcoming Promos</h2>
                    <div>
                        <div class="flex mb-3" style="height: 100%;">
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">Name</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">Discount (%)</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">Start Time</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">End Time</h3>
                            </div>
                        </div>
                        <hr class="my-3">
                        @foreach($notactivepromos as $promo)
                        <div class="flex mb-3" style="height: 100%;">
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">{{ $promo->name }}</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">{{ $promo->discount }}</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">{{ $promo->start_time }}</h3>
                            </div>
                            <div class="w-1/4 px-4 flex items-center" style="height: 100%; overflow: hidden;">
                                <h3 class="text-md font-semibold">{{ $promo->end_time }}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>