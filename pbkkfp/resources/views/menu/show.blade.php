<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-white leading-tight">
                {{$menu->name}}
            </h2>
            <div class="flex justify-end items-center">
                <a href="/menu">
                    <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Back') }}
                    </button>
                </a>
                @if(Auth::user()->role == 'admin')
                <a href="/menu/{{$menu->id}}/edit" class="mx-2">
                    <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Edit Menu') }}
                    </button>
                </a>
                <form method="POST" action="/menu/{{ $menu->id }}" onsubmit="return confirm('Are you sure you want to delete this menu item?');">
                    @csrf
                    @method('DELETE')
                    <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Delete Menu') }}
                    </button>
                </form>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="flex flex-wrap justify-center">
        <div class="w-4/5 p-4">
            <div class="bg-white shadow-lg rounded-lg p-4" style="margin-bottom: 60px; display: flex; flex-direction: column; height: 360px; overflow: hidden;">
                <div class="flex" style="height: 100%;">
                    <div class="w-1/2" style="height: 100%; overflow: hidden;">
                        <img src="{{asset('storage/photo/'.$menu->photo)}}" class="w-full h-auto object-cover rounded-lg" style="max-height: 100%;">
                    </div>
                    <div class="w-1/2 p-4" style="height: 100%; overflow: hidden;">
                        <h3 class="text-xl font-semibold mb-2">{{$menu->name}}</h3>
                        <p class="text-gray-600">{{$menu->description}}</p>
                        <p class="text-gray-950 mt-4">Rp {{number_format($menu->price, 0, ',', '.')}}</p>
                    </div>
                </div>
            </div>

            @php
            $menureviews = $reviews->where('menu_id', $menu->id);
            $total = $reviews->where('menu_id', $menu->id)->sum('rating');
            $count = $reviews->where('menu_id', $menu->id)->count();
            $rating = ($count > 0) ? ($total / $count) : 0;
            $userorders = $orders->where('user_id', Auth::user()->id);
            $menuordered = 0;
            foreach ($userorders as $order){
            $menuordered = $menuordered + $ordermenus->where('order_id', $order->id)->where('menu_id', $menu->id)->count();
            }
            @endphp

            <div class="flex justify-between">
                <p class="font-semibold text-xl text-gray-800 px-4">{{$menureviews->count()}} Reviews</p>
                <div class="flex px-4">
                    <p class="text-gray-950 mt-1">{{ number_format($rating, 1) }}</p>
                    <svg class="w-5 h-5 text-yellow-300 ml-1 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                </div>
            </div>
            <hr style="margin: 20px 0; border-top: 1px solid black;">

            <form method="POST" action="{{ route('review.create', ['id' => $menu->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 shadow-lg">

                    <div class="flex items-center px-3 py-2 border-t">
                        <svg class="w-4 h-4 text-yellow-300 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <x-input-label for="rating" />
                        <select id="rating" name="rating" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1" style="height: 30px; line-height: 30px; padding: 0 30px 0 10px;">
                            <option value="0" selected>-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                    </div>
                    <div class="px-4 py-2 bg-white rounded-t-lg">
                        <x-input-label for="message" />
                        <textarea id="message" name="message" rows="3" class="w-full px-0 text-md text-gray-900 bg-white border-0  focus:ring-0" placeholder="Write a review..."></textarea>

                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    @if ($menuordered > 0)
                    <div class="flex items-center justify-between px-3 py-2 border-t">
                        <button type=" submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Post Review') }}
                        </button>
                    </div>
                    @else
                    <div class="flex items-center">
                        <div class="flex items-center justify-between px-3 py-2 border-t">
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest cursor-not-allowed" disabled>
                                {{ __('Post Review') }}
                            </button>
                        </div>
                        <p class="text-sm text-red-600">You need to order the menu before posting a review.</p>
                    </div>
                    @endif
                </div>
            </form>

            @if($menureviews->count() > 0)
            <div class="w-full" style="margin-bottom: 60px">
                <div class="flex flex-wrap">
                    @foreach($menureviews as $review)
                    <div class="my-4 w-full">
                        <div class="bg-white shadow-lg rounded-lg p-4" style="display: flex; flex-direction: column; height: 100%; overflow: hidden;">
                            <div class="flex items-center">
                                <p class="text-gray-600 font-bold mr-5">{{$review->user->name}}</p>
                                <div class="flex items-center space-x-1">
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    @endfor
                                    @for ($i = 5 - $review->rating; $i > 0; $i--)
                                    <svg class="w-4 h-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    @endfor
                                </div>
                            </div>
                            <hr>
                            <p class="mt-2 text-gray-600">{{$review->message}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>