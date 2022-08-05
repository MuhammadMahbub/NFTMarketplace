@forelse($all_items as $item)
<article>
    <div
        class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
    >
        <a href="{{ route('item_details', $item->slug ?? "") }}" class="flex space-x-[0.625rem]">
        <span class="w-[100%]">
            <img style="width: 230px; height:230px"
            src="{{ asset('uploads/items') }}/{{ $item->image ?? "default.jpg" }}"
            alt="item 1"
            class="h-full rounded-[0.625rem] object-cover"
            loading="lazy"
            />
        </span>
        {{-- <span class="flex w-1/3 flex-col space-y-[0.625rem]">
            <img
            src="{{ asset('frontend_assets') }}/img/collections/collection_1_2.jpg"
            alt="item 1"
            class="h-full w-full rounded-[0.625rem] object-cover"
            loading="lazy"
            />
            <img
            src="{{ asset('frontend_assets') }}/img/collections/collection_1_2.jpg"
            alt="item 1"
            class="h-full w-full rounded-[0.625rem] object-cover"
            loading="lazy"
            />
            <img
            src="{{ asset('frontend_assets') }}/img/collections/collection_1_4.jpg"
            alt="item 1"
            class="h-full w-full rounded-[0.625rem] object-cover"
            loading="lazy"
            />
        </span> --}}
        </a>

        {{-- @php
           $user_id = APP\Models\Item::where('slug',$item->slug)->first()->creator_id;
           $user_items = APP\Models\Item::where('creator_id', $user_id)->where('slug','!=',$item->slug)->latest()->get();
        @endphp
        @foreach ($user_items as $item)
        <a href="{{ route('item_details', $item->slug) }}">
            <span class="flex w-1/3 flex-col space-y-[0.625rem] mt-3">
                <img
                src="{{ asset('uploads/items') }}/{{ $item->image }}"
                alt="item 1"
                class="h-full w-full rounded-[0.625rem]"
                loading="lazy"
                />
            </span>
        </a>
        @endforeach --}}

        <a
        href="{{ route('item_details', $item->slug ?? '') }}"
        class="font-display hover:text-accent dark:hover:text-accent text-jacarta-700 mt-4 block text-base dark:text-white"
        >
        {{ $item->name ?? 'N/A'}}
        </a>

        <div class="mt-2 flex items-center justify-between text-sm font-medium tracking-tight">
        <div class="flex flex-wrap items-center">
            <a href="{{ route('user', $item->get_creator->id ?? '') }}" class="mr-2 shrink-0">
            <img src="{{ asset('uploads/images/users') }}/{{ $item->get_creator->profile_photo_path ?? 'default.jpg'}}" alt="owner" class="h-5 w-5 rounded-full" />
            </a>
            <span class="dark:text-jacarta-400 mr-1">by</span>
            <a href="{{ route('user', $item->get_creator->id ?? '') }}" class="text-accent">
            <span>{{ $item->get_creator->name ?? 'N/A'}}</span>
            </a>
        </div>
        @php
            $item_count = App\Models\Item::where('creator_id', $item->creator_id)->count();
        @endphp
        <span class="dark:text-jacarta-300 text-sm">{{ $item_count ?? '0' }} Items</span>
        </div>
    </div>
</article>
@empty
<div><span style="color:rgb(255, 81, 0);">No Items Available</span></div>
@endforelse
