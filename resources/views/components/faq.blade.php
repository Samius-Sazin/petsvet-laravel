@php
$faqs = include resource_path('views/data/faqs.php');
@endphp

<div class="container my-5">
    <h1 class="text-center fw-bold mb-5 text-dark">
        Frequently Asked Questions
    </h1>

    <div class="d-flex justify-content-center">
        <div class="accordion w-100 w-md-75 w-lg-50" id="faqAccordion">
            @foreach($faqs as $index => $faq)
            <div class="accordion-item mb-3 rounded shadow-sm border-0 bg-info bg-opacity-25">
                <h2 class="accordion-header" id="faqHeading{{ $index }}">
                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqCollapse{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="faqCollapse{{ $index }}">
                        {{ $faq['title'] }}
                    </button>
                </h2>
                <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                    aria-labelledby="faqHeading{{ $index }}"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p class="text-justify">
                            {{ $faq['answers'][0]['answer'] }}
                        </p>
                        <a href="#" class="d-inline-flex align-items-center gap-2 text-decoration-none text-dark fw-semibold">
                            Learn More <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                        {{-- <a href="{{ url('qna/'.$faq['id']) }}" class="d-inline-flex align-items-center gap-2 text-decoration-none text-dark fw-semibold">
                            Learn More <i class="fas fa-long-arrow-alt-right"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
