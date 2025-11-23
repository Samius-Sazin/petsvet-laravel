@extends('main')

@section('title', '| Community')

@section('content')

    @php
        // Dummy data for posts
        $posts = [
            [
                'user_name' => 'Catherine Smith',
                'user_avatar' => 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
                'post_image' => asset('dummyProducts/blog-1.jpg'),
                'post_text' => 'Had a wonderful time at the park today! My little guy just loves chasing squirrels. 🐿️ So grateful for these sunny days and happy moments.',
                'loves' => 28,
                'comments' => 5,
            ],
            [
                'user_name' => 'Ben Johnson',
                'user_avatar' => 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
                'post_image' => asset('dummyProducts/blog-2.jpg'),
                'post_text' => 'Just adopted this beautiful cat from the local shelter. Everyone, meet Luna! 🌙 She is still a bit shy but so sweet. Any tips for helping a new cat settle in?',
                'loves' => 152,
                'comments' => 32,
            ],
            [
                'user_name' => 'Maria Garcia',
                'user_avatar' => 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png',
                'post_image' => asset('dummyProducts/blog-3.jpg'),
                'post_text' => 'Trying out a new recipe for homemade dog treats. They are all-natural with peanut butter and pumpkin. Fingers crossed my picky eater approves!',
                'loves' => 45,
                'comments' => 11,
            ],
        ];
    @endphp

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h1 class="text-center mb-4">Community Feed</h1>

                {{-- Post creation input --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="My Avatar"
                                class="rounded-circle me-3" style="width: 45px; height: 45px;">
                            <textarea class="form-control" rows="2" placeholder="What's on your mind?"></textarea>
                        </div>
                        <div class="text-end mt-3">
                            <button class="btn btn-primary">Post</button>
                        </div>
                    </div>
                </div>


                {{-- Feed of posts --}}
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        {{-- Post Header --}}
                        <div class="card-header bg-white border-0 pt-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ $post['user_avatar'] }}" alt="{{ $post['user_name'] }}"
                                    class="rounded-circle me-3" style="width: 45px; height: 45px;">
                                <div>
                                    <h6 class="fw-bold mb-0">{{ $post['user_name'] }}</h6>
                                    <small class="text-muted">2 hours ago</small>
                                </div>
                            </div>
                        </div>

                        {{-- Post Body --}}
                        <div class="card-body py-2">
                            <p class="card-text">{{ $post['post_text'] }}</p>
                        </div>

                        {{-- Post Image --}}
                        @if ($post['post_image'])
                            <img src="{{ $post['post_image'] }}" class="card-img-bottom" alt="Post image">
                        @endif

                        {{-- Post Actions --}}
                        <div class="card-footer bg-white border-0 py-3">
                            <div class="d-flex justify-content-around">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="far fa-heart me-2"></i> {{ $post['loves'] }} Loves
                                </a>
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="far fa-comment me-2"></i> {{ $post['comments'] }} Comments
                                </a>
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="fas fa-share me-2"></i> Repost
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection