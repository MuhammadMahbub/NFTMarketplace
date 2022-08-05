@foreach ($faqs as $faq)
    <div
    class="accordion-item dark:border-jacarta-600 border-jacarta-100 mb-5 overflow-hidden rounded-lg border"
    >
        <h2 class="accordion-header" id="faq-heading-{{ $faq->id }}">
        <button
            class="accordion-button dark:bg-jacarta-700 font-display text-jacarta-700 collapsed relative flex w-full items-center justify-between bg-white px-4 py-3 text-left dark:text-white"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#faq-{{ $faq->id }}"
            aria-expanded="false"
            aria-controls="faq-1"
        >
            <span>{{ $faq->question }}</span>
            <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            width="24"
            height="24"
            class="accordion-arrow fill-jacarta-700 h-4 w-4 shrink-0 transition-transform dark:fill-white"
            >
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z"></path>
            </svg>
        </button>
        </h2>
        <div
        id="faq-{{ $faq->id }}"
        class="accordion-collapse collapse"
        aria-labelledby="faq-heading-{{ $faq->id }}"
        data-bs-parent="#accordionFAQ"
        >
        <div
            class="accordion-body dark:bg-jacarta-700 dark:border-jacarta-600 border-jacarta-100 border-t bg-white p-4"
        >
            <p class="dark:text-jacarta-200">
            {{ $faq->answer }}
            </p>
        </div>
        </div>
    </div>
@endforeach
