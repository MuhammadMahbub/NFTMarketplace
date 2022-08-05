@foreach ($blogs as $blog)
<article>
  <div class="rounded-2.5xl overflow-hidden transition-shadow hover:shadow-lg">
    <figure class="group overflow-hidden">
      <a href="{{ route('single_post', $blog->slug) }}">
        <img
          src="{{asset('uploads/images/blog')}}/{{ $blog->main_image }}"
          alt="post 2"
          class="h-full w-full object-cover transition-transform duration-[1600ms] will-change-transform group-hover:scale-105"
        />
      </a>
    </figure>

    <!-- Body -->
    <div class="dark:border-jacarta-600 dark:bg-jacarta-700 border-jacarta-100 rounded-b-[1.25rem] border border-t-0 bg-white p-[10%]">
      <!-- Meta -->
      <div class="mb-3 flex flex-wrap items-center space-x-1 text-xs">
        <a href="#" class="dark:text-jacarta-200 text-jacarta-700 font-display hover:text-accent"
          >{{ $blog->author_name }}</a
        >
        <span class="dark:text-jacarta-400">in</span>
        <span class="text-accent inline-flex flex-wrap items-center space-x-1">
          <a href="{{ route('single_post', $blog->slug) }}">{{ $blog->relationToBlogCategory->category_name ?? '' }}</a>
        </span>
      </div>

      <h2
        class="font-display text-jacarta-700 dark:hover:text-accent hover:text-accent mb-4 text-xl dark:text-white"
      >
        <a href="{{ route('single_post', $blog->slug) }}">{{ $blog->title }}</a>
      </h2>
      <p class="dark:text-jacarta-200 mb-8">
          {{ $blog->subtitle }}
      </p>

      <!-- Date / Time -->
      <div class="text-jacarta-400 flex flex-wrap items-center space-x-2 text-sm">
        <span><time datetime="2022-02-05">{{ $blog->created_at->diffForHumans() }}</time></span>
      </div>
    </div>
  </div>
</article>
@endforeach
