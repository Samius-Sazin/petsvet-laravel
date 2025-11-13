<div class="container-fluid bg-primary text-dark py-5 px-3 px-md-5">
    <div class="row align-items-center justify-content-around flex-column-reverse flex-md-row">
        {{-- Left Area --}}
        <div class="col-md-6 d-flex flex-column align-items-start gap-2 mt-4 mt-md-0">
            <h1 class="fw-bold lh-base text-uppercase" style="letter-spacing: 1px;">
                WE CARE <br> ABOUT YOUR PET
            </h1>
            <p class="fw-semibold text-dark" style="font-size: 1rem;">
                Where your pet’s health meets expert care with compassion
            </p>
            <a href="#"
               class="btn btn-dark text-primary fw-semibold d-flex align-items-center gap-2 mt-3 mt-lg-4 px-3 px-md-4 py-2"
               style="transition: color 0.3s;"
               onmouseover="this.style.color='#70c8f5'"
               onmouseout="this.style.color='#0082cf'">
                Get Started
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
        </div>

        {{-- Right Area --}}
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('images/logo.png') }}" alt="petsvet" class="img-fluid rounded" style="max-width: 400px;">
        </div>
    </div>
</div>
