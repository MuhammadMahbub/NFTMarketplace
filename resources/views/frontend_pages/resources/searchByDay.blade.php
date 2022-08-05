@forelse ($all_items as $item)
<div class="border-jacarta-100 dark:bg-jacarta-700 rounded-2.5xl flex border bg-white py-4 px-7 transition-shadow hover:shadow-lg dark:border-transparent">
<figure class="mr-4 shrink-0">
    <a href="{{ route('item_details', $item->slug) }}" class="relative block">
    <img src="{{ asset('uploads/items') }}/{{ $item->image }}" alt="avatar 3" class="rounded-2lg" loading="lazy" style="width: 48px; height:48px"/>
    <div
        class="dark:border-jacarta-600 bg-jacarta-700 absolute -left-3 top-1/2 flex h-6 w-6 -translate-y-2/4 items-center justify-center rounded-full border-2 border-white text-xs text-white"> {{ $item->quantity }}
    </div>
    </a>
</figure>
<div>
    <a href="{{ route('item_details', $item->slug ) }}" class="block">
    <span class="font-display text-jacarta-700 hover:text-accent font-semibold dark:text-white"
        >{{ $item->name }}</span
    >
    </a>
    <a href="{{ route('cat_search_item', $item->get_category->id ?? '') }}" class="block">Category:
    <span class="font-display text-jacarta-700 hover:text-accent font-semibold dark:text-white"
        >{{ $item->get_category->name ?? "N/A"}}</span
    >
    </a>
    <span class="dark:text-jacarta-300 text-sm">{{ $item->price }} {{ $item->blockchain }}</span>
</div>
</div>
@empty
<div style="color: #e4761b">No Items Availble</div>
@endforelse
