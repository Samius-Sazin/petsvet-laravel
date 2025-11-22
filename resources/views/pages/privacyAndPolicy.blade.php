@php
    $logo = asset('images/logo_blue.png');
    $bgImage = asset('images/privacy_policy.png');
@endphp

@extends('main')
@section('title', '| Privacy Policy')


@section('content')
    <div class="privacy-page">

        <!-- Background Section -->
        <div class="privacy-hero" style="background-image: url('{{ $bgImage }}')">
            <div class="overlay"></div>

            <!-- Logo -->
            <div class="privacy-logo text-center">
                <img src="{{ $logo }}" alt="Website Logo" style="width:200px !important; height:auto;">
            </div>

            <div class="hero-text text-center">
                <h1 class="fw-bold display-5">
                    Privacy Policy
                </h1>
                <p class="lead">
                    We respect your privacy. Learn how we collect, use, and protect your information.
                </p>
            </div>
        </div>

        <div class="container privacy-container py-5">

            @php
                $sections = [
                    ['title' => '1. Introduction', 'content' => 'We value your privacy...'],
                    [
                        'title' => '2. Information We Collect',
                        'content' =>
                            '<ul><li>Personal details such as name, email, phone number</li><li>Technical data such as IP, device info, browser type</li><li>Cookies and tracking tools</li></ul>',
                    ],
                    [
                        'title' => '3. How We Use Your Information',
                        'content' =>
                            '<ul><li>To improve services</li><li>To provide support</li><li>To send updates (if you opt-in)</li></ul>',
                    ],
                    ['title' => '4. Sharing Your Information', 'content' => '<p>We never sell your data...</p>'],
                    ['title' => '5. Cookies and Tracking', 'content' => 'We use cookies to improve your experience.'],
                    ['title' => '6. Data Security', 'content' => 'We use industry-standard security methods.'],
                    [
                        'title' => '7. Your Rights',
                        'content' => '<ul><li>Access, update, delete your data</li><li>Withdraw consent</li></ul>',
                    ],
                    [
                        'title' => '8. Third-Party Links',
                        'content' => 'We are not responsible for third-party websites.',
                    ],
                    ['title' => '9. Changes to This Policy', 'content' => 'We may update this policy occasionally.'],
                    [
                        'title' => '10. Contact Us',
                        'content' =>
                            '<p>Email: <strong>petsVet.help@gmail.com</strong></p><p>Phone: <strong>+8801700000074</strong></p>',
                    ],
                ];
            @endphp

            @foreach ($sections as $section)
                <section class="policy-card mb-4 p-4 rounded-4">
                    <h3 class="fw-bold mb-3">{{ $section['title'] }}</h3>
                    <div class="policy-content">{!! $section['content'] !!}</div>
                </section>
            @endforeach

        </div>
    </div>

    <style>
        /* PAGE WRAPPER */
        .privacy-page {
            width: 100%;
            overflow-x: hidden;
        }

        /* BACKGROUND SECTION */
        .privacy-hero {
            position: relative;
            height: 320px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Overlay */
        .privacy-hero .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(4px);
        }

        /* LOGO */
        .privacy-logo img {
            width: 110px;
            height: auto;
            margin-bottom: 15px;
            filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.4));
            animation: fadeIn 1.4s ease;
        }

        /* HERO TEXT */
        .hero-text {
            position: relative;
            color: white;
            animation: slideUp 0.8s ease-out;
        }

        .hero-text h1 {
            background: linear-gradient(90deg, #ffffff, #d9e8ff);
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.4);
        }

        /* CARD AREA */
        .privacy-container {
            max-width: 950px;
        }

        .policy-card {
            background: rgba(255, 255, 255, 0.85);
            border-left: 6px solid #0d6efd;
            backdrop-filter: blur(6px);
            transition: all 0.3s ease;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12);
        }

        .policy-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
            border-left-color: #6610f2;
        }

        .policy-card h3 {
            color: #0d6efd;
        }

        .policy-card:hover h3 {
            color: #6610f2;
        }

        .policy-content {
            color: #495057;
            font-size: 1rem;
            line-height: 1.65;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
@endsection
