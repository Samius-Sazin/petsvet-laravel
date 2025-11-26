@extends('main')

@section('title', '| Blogs')

@section('content')


    <div class="container-fluid px-0 mb-5">
        <div class="position-relative">
            <img src="/dummyProducts/hero.jpg" alt="Blogs Banner" class="w-100" style="height: 400px; object-fit: cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                style="background-color: rgba(0, 0, 0, 0.6);">
                <h1 class="text-white display-3 fw-bold">Articles</h1>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-6 col-md-4 d-flex align-items-center gap-2">
                <form class="w-100 d-flex align-items-center">
                    <div class="input-group d-none d-md-flex">
                        <span class="input-group-text bg-white btn border"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search products...">
                    </div>
                    <button class="btn btn-outline-dark d-md-none">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <div class="col-6 col-md-8 d-flex justify-content-end gap-3">
                <div class="d-flex align-items-center gap-1 btn border">
                    <i class="fas fa-sort"></i>
                    <span class="d-none d-md-inline">Sort By</span>
                </div>
                <div class="d-flex align-items-center gap-1 btn border">
                    <i class="fas fa-filter"></i>
                    <span class="d-none d-md-inline">Category</span>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 80px 0;"></div>

    <div class="container mb-5">
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-1.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-1.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-2.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-2.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-3.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-3.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-4.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-4.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-5.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-5.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-6.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-6.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-7.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-7.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-8.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-8.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 article-card" 
                     data-article-image="/dummyProducts/blog-9.jpg"
                     data-article-category="Pet Health"
                     data-article-title="Understanding Your Pet's Body Language: Signs of Illness"
                     data-article-excerpt="Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor."
                     data-article-date="12 Oct, 2024"
                     data-article-content="Understanding your pet's body language is crucial for early detection of health issues. Pets communicate their discomfort and illness through subtle changes in behavior, posture, and activity levels. Recognizing these signs early can make a significant difference in your pet's health and well-being. Common indicators include changes in appetite, lethargy, unusual vocalizations, and alterations in sleeping patterns. Physical signs such as limping, excessive scratching, or changes in bathroom habits should never be ignored. Regular observation and understanding of your pet's normal behavior will help you identify when something is wrong. Always consult with a veterinarian if you notice any concerning changes in your pet's behavior or physical condition.">
                    <img src="/dummyProducts/blog-9.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3 article-title" style="cursor: pointer;">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center article-read-more">
                            Read More
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="ms-2">
                                <path d="M1.25 8.25H15.25M15.25 8.25L8.25 1.25M15.25 8.25L8.25 15.25" stroke="#0082CF"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container text-center mb-5">
        <button class="btn btn-primary btn-lg px-5">View More</button>
    </div>

    <div style="margin: 80px 0;"></div>

    @include('components.latestArticles')

    <!-- Article Detail Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content d-flex flex-column" style="min-height: 80vh; background-color: #fff;">
                <div class="modal-body flex-grow-1" style="overflow-y: auto; background-color: #fff;">
                    <img id="modalArticleImage" src="" alt="Article Image" class="img-fluid rounded mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
                    <p id="modalArticleCategory" class="text-primary small mb-2 fw-semibold"></p>
                    <h2 id="modalArticleTitle" class="mb-3"></h2>
                    <p id="modalArticleDate" class="text-muted small mb-4"></p>
                    <div id="modalArticleContent" class="article-content" style="line-height: 1.8; color: #333;"></div>
                </div>
                <div class="modal-footer border-0" style="position: sticky; bottom: 0; z-index: 10; background-color: #fff; padding: 12px 20px; border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <div class="d-flex align-items-center gap-3 w-100">
                        <button type="button" class="btn p-0 border-0 bg-transparent article-reaction-btn" data-reaction="love" style="color: #262626; display: flex; align-items: center;">
                            <span id="loveIcon" style="display: inline-flex; align-items: center;">
                                <svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24" id="likeIconSvg"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                            </span>
                            <span id="loveCount" class="text-dark ms-2" style="font-size: 14px; font-weight: 400;">0</span>
                        </button>
                        <button type="button" class="btn p-0 border-0 bg-transparent article-reaction-btn" data-reaction="share" style="color: #262626; margin-left: auto;">
                            <svg aria-label="Share" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Share</title><path d="M13.973 20.046 21.77 6.928C22.8 5.195 21.55 3 19.535 3H4.466C2.138 3 .984 5.825 2.646 7.456l4.842 4.752 1.723 7.121c.548 2.266 3.571 2.721 4.762.717Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="7.488" x2="15.515" y1="12.208" y2="7.641"></line></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('articleModal'));

            function showArticleModal(card) {
                const image = card.getAttribute('data-article-image');
                const category = card.getAttribute('data-article-category');
                const title = card.getAttribute('data-article-title');
                const date = card.getAttribute('data-article-date');
                const content = card.getAttribute('data-article-content');

                document.getElementById('modalArticleImage').src = image;
                document.getElementById('modalArticleCategory').textContent = category;
                document.getElementById('modalArticleTitle').textContent = title;
                document.getElementById('modalArticleDate').textContent = date;
                document.getElementById('modalArticleContent').textContent = content;

                modal.show();
            }

            // Handle clicks on article titles
            document.querySelectorAll('.article-title').forEach((title) => {
                title.addEventListener('click', function(e) {
                    e.preventDefault();
                    const articleCard = this.closest('.article-card');
                    if (articleCard) {
                        showArticleModal(articleCard);
                    }
                });
            });

            // Handle clicks on "Read More" links
            document.querySelectorAll('.article-read-more').forEach((link) => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const articleCard = this.closest('.article-card');
                    if (articleCard) {
                        showArticleModal(articleCard);
                    }
                });
            });

            // Handle reaction button clicks
            document.querySelectorAll('.article-reaction-btn').forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const reaction = this.getAttribute('data-reaction');
                    const articleTitle = document.getElementById('modalArticleTitle').textContent;
                    const loveIcon = document.getElementById('loveIcon');
                    const loveCount = document.getElementById('loveCount');
                    
                    if (reaction === 'love') {
                        // Toggle love button (Instagram style)
                        const isActive = this.classList.contains('active');
                        
                        if (isActive) {
                            // Unlike: change to outline heart, decrease count
                            this.classList.remove('active');
                            loveIcon.innerHTML = '<svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24" id="likeIconSvg"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>';
                            this.style.color = '#262626';
                            let count = parseInt(loveCount.textContent) || 0;
                            count = Math.max(0, count - 1);
                            loveCount.textContent = count || '0';
                        } else {
                            // Like: change to filled heart (red), increase count
                            this.classList.add('active');
                            loveIcon.innerHTML = '<svg class="x1lliihq x1n2onr6 xxk16z8" fill="#ed4956" height="24" role="img" viewBox="0 0 48 48" width="24" id="likeIconSvg"><title>Unlike</title><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>';
                            let count = parseInt(loveCount.textContent) || 0;
                            count += 1;
                            loveCount.textContent = count;
                        }
                    } else if (reaction === 'share') {
                        // Share functionality
                        if (navigator.share) {
                            navigator.share({
                                title: articleTitle,
                                text: document.getElementById('modalArticleContent').textContent.substring(0, 100) + '...',
                                url: window.location.href
                            }).catch(err => console.log('Error sharing', err));
                        } else {
                            // Fallback: copy to clipboard
                            const url = window.location.href;
                            navigator.clipboard.writeText(url).then(() => {
                                alert('Link copied to clipboard!');
                            }).catch(err => console.log('Error copying', err));
                        }
                    }
                });
            });
        });
    </script>
@endsection
