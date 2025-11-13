@extends('main')

@section('content')
    @php
        $whatsapp = [
            'mobile' => '+8801611140562',
            'message' => "I'm interested in your services. Could you provide more details?",
        ];

        $facebook = [
            'userName' => 'sazin.samii',
            'message' => "I'm interested in your services. Could you provide more details?",
        ];
    @endphp

    <div class="container py-5 d-flex justify-content-center consultancy-page">
        <div class="text-center consultancy-card">
            <h2 class="display-4 fw-bold mb-3">
                <span class="text-danger">Content</span> is Updating!
            </h2>
            <p class="fs-5 mb-4">
                For getting direct consultation, please connect with us via...
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
                <!-- WhatsApp Button -->
                <a href="https://wa.me/{{ $whatsapp['mobile'] }}?text={{ urlencode($whatsapp['message']) }}" target="_blank"
                    class="btn btn-success btn-lg d-flex align-items-center gap-2">
                    <svg class="bi me-1" width="24" height="24" fill="currentColor" viewBox="0 0 48 49">
                        <path
                            d="M24.006 0.5H23.994C10.761 0.5 0 11.264 0 24.5C0 29.75 1.692 34.616 4.569 38.567L1.578 47.483L10.803 44.534C14.598 47.048 19.125 48.5 24.006 48.5C37.239 48.5 48 37.733 48 24.5C48 11.267 37.239 0.5 24.006 0.5Z"
                            fill="#4CAF50" />
                        <path
                            d="M37.9716 34.3911C37.3926 36.0261 35.0946 37.3821 33.2616 37.7781C32.0076 38.0451 30.3696 38.2581 24.8556 35.9721C17.8026 33.0501 13.2606 25.883 12.9066 25.4181C12.5676 24.9531 10.0566 21.6231 10.0566 18.1791C10.0566 14.7351 11.8056 13.0581 12.5106 12.3381C13.0896 11.7471 14.0466 11.4771 14.9646 11.4771C15.2616 11.4771 15.5286 11.4921 15.7686 11.5041C16.4736 11.5341 16.8276 11.5761 17.2926 12.6891C17.8716 14.0841 19.2816 17.5281 19.4496 17.8821C19.6206 18.2361 19.7916 18.7161 19.5516 19.1811C19.3266 19.6611 19.1286 19.8741 18.7746 20.2821C18.4206 20.6901 18.0846 21.0021 17.7306 21.4401C17.4066 21.8211 17.0406 22.2291 17.4486 22.9341C17.8566 23.6241 19.2666 25.925 21.3426 27.7731C24.0216 30.1581 26.1936 30.9201 26.9706 31.2441C27.5496 31.4841 28.2396 31.4271 28.6626 30.9771C29.1996 30.3981 29.8626 29.4381 30.5376 28.4931C31.0176 27.8151 31.6236 27.7311 32.2596 27.9711C32.9076 28.1961 36.3366 29.8911 37.0416 30.2421C37.7466 30.5961 38.2116 30.7641 38.3826 31.0611C38.5506 31.3581 38.5506 32.7531 37.9716 34.3911Z"
                            fill="#FAFAFA" />
                    </svg>
                    Whatsapp
                </a>

                <!-- Facebook Button -->
                <a href="https://m.me/{{ $facebook['userName'] }}?text={{ urlencode($facebook['message']) }}"
                    target="_blank" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
                    <svg class="bi me-1" width="24" height="24" fill="currentColor" viewBox="0 0 48 49">
                        <path
                            d="M48 24.5C48 36.4794 39.2231 46.4084 27.75 48.2084V31.4375H33.3422L34.4062 24.5H27.75V19.9981C27.75 18.0997 28.68 16.25 31.6613 16.25H34.6875V10.3438C34.6875 10.3438 31.9406 9.875 29.3147 9.875C23.8331 9.875 20.25 13.1975 20.25 19.2125V24.5H14.1562V31.4375H20.25V48.2084C8.77688 46.4084 0 36.4794 0 24.5C0 11.2456 10.7456 0.5 24 0.5C37.2544 0.5 48 11.2456 48 24.5Z"
                            fill="#1877F2" />
                        <path
                            d="M33.3422 31.4375L34.4062 24.5H27.75V19.998C27.75 18.1001 28.6798 16.25 31.6612 16.25H34.6875V10.3438C34.6875 10.3438 31.941 9.875 29.3152 9.875C23.833 9.875 20.25 13.1975 20.25 19.2125V24.5H14.1562V31.4375H20.25V48.2083C21.4719 48.4001 22.7242 48.5 24 48.5C25.2758 48.5 26.5281 48.4001 27.75 48.2083V31.4375H33.3422Z"
                            fill="white" />
                    </svg>
                    Facebook
                </a>
            </div>
        </div>

    </div>

    <style>
        /* Scoped styles for consultancy page */
        .consultancy-page {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .consultancy-card {
            background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 8px 28px rgba(15, 23, 42, 0.06);
            max-width: 920px;
            width: 100%;
        }

        .consultancy-card h2 {
            font-size: 2.25rem;
            line-height: 1.05;
            margin-bottom: 0.75rem;
        }

        .consultancy-card p {
            font-size: 1.125rem;
            color: #4b5563;
            margin-bottom: 1rem;
        }

        .consultancy-actions {
            gap: 1rem;
            margin-top: 1rem;
        }

        .consultancy-actions .btn {
            min-width: 160px;
            padding: 0.65rem 1rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .consultancy-actions .btn svg {
            width: 22px;
            height: 22px;
        }

        .consultancy-actions .btn.btn-success {
            background: #25D366;
            border-color: #25D366;
        }

        .consultancy-actions .btn.btn-primary {
            background: #1877F2;
            border-color: #1877F2;
        }

        .consultancy-card .btn:focus {
            box-shadow: 0 0 0 0.25rem rgba(24, 118, 242, 0.15);
            outline: none;
        }

        @media (max-width: 576px) {
            .consultancy-actions {
                flex-direction: column;
            }

            .consultancy-actions .btn {
                width: 100%;
            }

            .consultancy-card h2 {
                font-size: 1.6rem;
            }

            .consultancy-card p {
                font-size: 1rem;
            }
        }
    </style>
@endsection
