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

    <!-- Filter & Search Row -->
    <div class="container my-4">
        <div class="row align-items-center">
            <!-- Search bar -->
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

            <!-- Sort + Category (Right Side) -->
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-1.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-2.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-3.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-4.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-5.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-6.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-7.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-8.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
                <div class="card h-100 border-0 ">
                    <img src="/dummyProducts/blog-9.jpg" class="card-img-top" alt="Blog Post"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <p class="text-primary small mb-2 fw-semibold">Pet Health</p>
                        <h5 class="card-title mb-3">Understanding Your Pet's Body Language: Signs of Illness</h5>
                        <p class="card-text text-muted small mb-3">
                            Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies.
                            Duis at congue ultrices at. Praesent risus risus tortor.
                        </p>
                        <p class="text-muted small mb-3">12 Oct, 2024</p>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center">
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
@endsection
