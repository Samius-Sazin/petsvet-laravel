@extends('main')

@section('title', '| Community')

@section('content')

    {{-- Custom CSS for subtle interactions --}}
    <style>
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .comment-bubble {
            border-radius: 18px;
            border-top-left-radius: 4px;
        }

        .action-btn {
            transition: background-color 0.2s;
            border-radius: 50px;
            padding: 6px 15px;
        }

        .action-btn:hover {
            background-color: #f0f2f5;
            text-decoration: none;
            color: inherit;
        }
    </style>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                {{-- HERO SECTION --}}
                <div class="text-center py-4 mb-5 rounded-4"
                    style="background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%); border-bottom: 4px solid #0d6efd;">
                    <h1 class="display-6 fw-bold text-dark mb-2">Where Every Pet Has a Story 🐾</h1>
                    <p class="text-muted mx-auto col-10 mb-0" style="font-size: 1.1rem;">
                        Connect, share, and celebrate the moments that make pet parenting special.
                    </p>
                </div>

                {{-- FLASH MESSAGES --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4"
                        role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- POST CREATION TRIGGER --}}
                <div class="card mb-5 shadow-sm border-0 rounded-4 hover-lift cursor-pointer" data-bs-toggle="modal"
                    data-bs-target="#createPostModal" style="cursor: pointer;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ Auth::check() ? Auth::user()->photo : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                alt="My Avatar" class="rounded-circle me-3 border"
                                style="width: 50px; height: 50px; object-fit: cover;">

                            <div class="w-100 bg-light rounded-pill px-3 py-2 border">
                                <span class="text-muted" style="line-height: 30px;">Share your pet's latest
                                    adventure...</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3 px-2">
                            <small class="text-muted"><i class="fas fa-image text-success me-1"></i> Photo</small>
                            <small class="text-muted"><i class="fas fa-smile text-warning me-1"></i> Feeling</small>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4 border-0 shadow-lg">
                            @guest
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold" id="createPostModalLabel">Join the Conversation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center py-5">
                                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" width="80" class="mb-3 opacity-75"> --}}
                                    <i class="fa-solid fa-user fs-1 text-dark"></i>
                                    <p class="mb-4 text-muted">Please log in to share your story and connect with our community.
                                    </p>
                                    <div class="d-grid gap-2 col-8 mx-auto">
                                        <div class="d-grid gap-2">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary"
                                                id="googleLoginBtn" onclick="loginWithGoogle()">
                                                <i class="fab fa-google me-2"></i> Login with Google
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endguest

                            @auth
                                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title fw-bold" id="createPostModalLabel">Create Post</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="{{ Auth::user()->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                                class="rounded-circle me-2" width="40" height="40">
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                                                <span class="badge bg-light text-dark border">Public</span>
                                            </div>
                                        </div>
                                        <textarea name="post_text" class="form-control border-0 fs-5" rows="4" style="resize: none;"
                                            placeholder="What's on your mind, {{ Auth::user()->name }}?"></textarea>

                                        {{-- Image Preview Area (Optional logic can be added here) --}}
                                    </div>
                                    <div class="modal-footer border-0 justify-content-between px-4 pb-4">
                                        <div
                                            class="border rounded-3 px-3 py-2 d-flex align-items-center gap-3 w-100 mb-3 bg-light">
                                            <span class="small fw-bold">Add to your post:</span>

                                            {{-- Hidden file input --}}
                                            <input type="file" id="postImage" name="post_image"
                                                accept="image/png, image/jpeg, image/gif, image/webp" style="display: none;">

                                            <button type="button" class="btn btn-sm btn-light rounded-circle text-success"
                                                onclick="document.getElementById('postImage').click();" title="Add Photo">
                                                <i class="fas fa-images fa-lg"></i>
                                            </button>

                                            <select class="form-select form-select-sm border-0 bg-transparent py-0"
                                                id="feeling" name="feeling" style="width: auto; cursor: pointer;">
                                                <option selected value="">🙂 Feeling</option>
                                                <option value="happy">😄 Happy</option>
                                                <option value="loved">❤️ Loved</option>
                                                <option value="excited">🎉 Excited</option>
                                                <option value="sad">😢 Sad</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary rounded-pill px-4 w-100 fw-bold">Post
                                            Update</button>
                                    </div>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>


                {{-- FEED OF POSTS --}}
                @forelse ($posts as $post)
                    <div class="card mb-5 border-0 shadow-sm rounded-4">

                        {{-- Post Header --}}
                        <div class="card-header bg-white border-0 pt-4 pb-0 px-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $post->user->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                        alt="{{ $post->user->name }}" class="rounded-circle me-3 shadow-sm border"
                                        style="width: 48px; height: 48px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold mb-0 text-dark">{{ $post->user->name }}</h6>
                                        <small class="text-muted" style="font-size: 0.8rem;">
                                            {{ $post->created_at->diffForHumans() }}
                                            @if (isset($post->feeling))
                                                • is feeling {{ $post->feeling }}
                                            @endif
                                        </small>
                                    </div>
                                </div>
                                <button class="btn btn-link text-muted"><i class="fas fa-ellipsis-h"></i></button>
                            </div>
                        </div>

                        {{-- Post Body --}}
                        <div class="card-body px-4">
                            <p class="card-text mb-3" style="font-size: 1.05rem; line-height: 1.6; color: #333;">
                                {{ $post->content }}</p>

                            {{-- Post Image --}}
                            @if ($post->image_url)
                                <div class="rounded-4 overflow-hidden shadow-sm mt-3">
                                    <img src="{{ $post->image_url }}" class="img-fluid w-100" alt="Post image"
                                        style="object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        {{-- Post Actions --}}
                        <div class="px-3 pb-2">
                            <div class="d-flex justify-content-between align-items-center py-2 border-top mx-2">
                                <form action="{{ route('posts.toggleLike', ['postId' => $post->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit"
                                        class="btn action-btn text-decoration-none {{ $post->is_liked ? 'text-danger' : 'text-muted' }}">
                                        <i class="{{ $post->is_liked ? 'fas' : 'far' }} fa-heart me-1"></i>
                                        {{ $post->likes_count }} <span class="d-none d-md-inline">Loves</span>
                                    </button>
                                </form>

                                <a href="#comments-section-{{ $post->id }}"
                                    class="action-btn text-muted text-decoration-none d-flex align-items-center"
                                    data-bs-toggle="collapse" role="button" aria-expanded="false">
                                    <i class="far fa-comment-alt me-2"></i> {{ $post->comments->count() }} <span
                                        class="d-none d-md-inline">Comments</span>
                                </a>

                                <a href="#"
                                    class="action-btn text-muted text-decoration-none d-flex align-items-center">
                                    <i class="fas fa-share me-2"></i> <span class="d-none d-md-inline">Share</span>
                                </a>
                            </div>
                        </div>

                        {{-- Comments Section --}}
                        <div class="collapse {{ $errors->any() ? 'show' : '' }}"
                            id="comments-section-{{ $post->id }}">
                            <div class="card-footer bg-light border-0 rounded-bottom-4 p-4">

                                {{-- Existing Comments --}}
                                @if ($post->comments->count() > 0)
                                    <div class="mb-4">
                                        @foreach ($post->comments as $comment)
                                            <div class="d-flex align-items-start mb-3">
                                                <img src="{{ $comment->user->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                                    alt="{{ $comment->user->name }}" class="rounded-circle me-2 mt-1"
                                                    style="width: 32px; height: 32px; object-fit: cover;">
                                                <div>
                                                    <div class="bg-white p-3 shadow-sm comment-bubble">
                                                        <strong
                                                            class="d-block mb-1 text-dark">{{ $comment->user->name }}</strong>
                                                        <span class="text-secondary">{{ $comment->body }}</span>
                                                    </div>
                                                    <small class="text-muted ms-2"
                                                        style="font-size: 0.75rem;">{{ $comment->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                {{-- New Comment Form --}}
                                @auth
                                    <form action="{{ route('posts.comments.store', ['postId' => $post->id]) }}"
                                        method="POST" class="d-flex align-items-start">
                                        @csrf
                                        <img src="{{ Auth::user()->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                            alt="My Avatar" class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover;">
                                        <div class="input-group">
                                            <input type="text" name="body"
                                                class="form-control rounded-pill bg-white border-0 shadow-sm ps-3"
                                                placeholder="Write a comment..." required style="height: 40px;">
                                            <button type="submit" class="btn btn-primary rounded-pill ms-2 px-3"><i
                                                    class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                @endauth
                                @guest
                                    <p class="text-center text-muted small mb-0">Log in to join the discussion.</p>
                                @endguest
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100"
                                class="opacity-50">
                        </div>
                        <h4 class="text-muted fw-bold">No posts yet</h4>
                        <p class="text-muted">Be the first to share your pet's story!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
