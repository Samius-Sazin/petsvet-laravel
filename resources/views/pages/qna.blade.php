@extends('main')

@section('title', '| QNA')

@section('content')
<style>
/* Custom CSS for QnA Page */
.qna-hero { background: linear-gradient(90deg,#6ec3ff,#a8e3ff); border-radius:18px; padding:40px 30px; color:#003654; margin-bottom:32px; }
.qna-card { border-radius:14px; border:none; box-shadow:0 6px 16px rgba(0,0,0,0.06); }
.qna-stat-number { font-weight: bold; color: #003654; }
.pet-icon { width: 40px; height: 40px; background: #eef7ff; color: #007bff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; }
</style>

<div class="container py-4">
    
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Errors --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- HERO SECTION --}}
    <div class="qna-hero mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="qna-hero-title fw-bold">Ask Anything About Your Pet ❤️🐾</h1>
                <p class="qna-hero-subtitle mb-0 fs-5">Join the PetsVets community. Get professional advice from vets.</p>
            </div>
            <div class="col-md-4 text-center mt-3 mt-md-0">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Pets" width="110">
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- LEFT COLUMN: Questions List --}}
        <div class="col-lg-8">
            
            {{-- Search & Filters --}}
            <div class="card qna-card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted fw-bold">
                            Showing {{ $questions->count() }} Questions
                        </div>

                        <form method="GET" action="{{ route('qna.index') }}" class="d-inline-block">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            
                            <select name="sort" class="form-select form-select-sm border-primary fw-bold text-primary" onchange="this.form.submit()" style="width: 140px; cursor: pointer;">
                                <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest</option>
                                <option value="top" {{ request('sort') == 'top' ? 'selected' : '' }}>Top Voted</option>
                                <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Oldest</option>
                            </select>
                        </form>
                    </div>

                    <hr class="text-muted opacity-25 my-2">

                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <a href="{{ route('qna.index', ['sort' => request('sort')]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 {{ !request('category') ? 'active' : '' }}">All pets</a>
                        
                        @foreach($categories as $cat)
                            <a href="{{ route('qna.index', ['category' => $cat->id, 'sort' => request('sort')]) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 {{ request('category') == $cat->id ? 'active' : '' }}">
                                {{ $cat->name }}
                                <span class="badge bg-white text-primary ms-1 rounded-circle">{{ $cat->questions_count ?? 0 }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Question Loop --}}
            <div id="qna-question-list">
                @foreach($questions as $q)
                    <div class="card qna-card mb-4 qna-question-card hover-shadow transition-all">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                
                                {{-- Pet Icon --}}
                                <div class="me-3 mt-1 pet-icon flex-shrink-0">
                                    <i class="fa-solid fa-paw"></i>
                                </div>

                                {{-- Question Content --}}
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fw-bold text-dark">{{ $q->title }}</h5>
                                    <div class="small text-muted mb-2">
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info px-2 py-1 me-2">{{ $q->category->name ?? 'Other' }}</span>
                                        <span>Asked by <strong>{{ $q->guest_name ?? ($q->user->name ?? 'Guest') }}</strong> · {{ $q->created_at->format('d M Y') }}</span>
                                    </div>
                                    <p class="text-secondary small mb-3">{{ \Illuminate\Support\Str::limit($q->body, 250) }}</p>
                                
                                    {{-- ACTION BAR (Fixed Design) --}}
                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                        
                                        {{-- Left Side: Upvote --}}
                                        <form action="{{ route('qna.upvote', $q->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold" title="Upvote this question">
                                                👍 <span class="ms-1">{{ $q->upvotes }}</span>
                                            </button>
                                        </form>

                                        {{-- Right Side: Reply, View, Delete --}}
                                        <div class="d-flex align-items-center gap-2">
                                            
                                            {{-- Reply Button --}}
                                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3 qna-reply-toggle" data-question-id="{{ $q->id }}">
                                                <i class="fa-regular fa-comment-dots me-1"></i> Reply
                                            </button>

                                            {{-- View Answers Button --}}
                                            <button class="btn btn-sm btn-light text-primary fw-bold rounded-pill px-3 text-nowrap qna-view-answers" data-question-id="{{ $q->id }}">
                                                View Answers ({{ $q->answer_count }})
                                            </button>

                                            {{-- Delete Button (Owner or Admin Only) --}}
                                            @auth
                                                @if(auth()->id() === $q->user_id || auth()->user()->isAdmin())
                                                    <div class="vr mx-1"></div> {{-- Divider --}}
                                                    <form action="{{ route('qna.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0 rounded-circle" title="Delete Question" style="width: 32px; height: 32px;">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                    {{-- End Action Bar --}}

                                </div>
                            </div>

                            {{-- ANSWERS SECTION (Hidden) --}}
                            <div class="mt-3 qna-answers d-none bg-light p-3 rounded-3" id="answers-{{ $q->id }}">
                                @if($q->answers->count())
                                    <h6 class="small fw-bold text-muted mb-3">Professional Answers:</h6>
                                    @foreach($q->answers as $ans)
                                        <div class="card border-0 shadow-sm mb-2">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px; font-size: 12px;">
                                                        <i class="fa-solid fa-user-doctor"></i>
                                                    </div>
                                                    <div class="fw-bold text-dark small">
                                                        {{ $ans->responder_name ?? ($ans->user->name ?? 'Vet Staff') }}
                                                        <span class="text-muted fw-normal ms-1" style="font-size: 0.8em;">• {{ $ans->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <p class="mb-0 small text-secondary">{!! nl2br(e($ans->body)) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center text-muted small py-2">
                                        <i class="fa-regular fa-hourglass-half me-1"></i> No professional answers yet.
                                    </div>
                                @endif
                            </div>

                            {{-- REPLY FORM (Vet/Admin Only) --}}
                            <div class="mt-3 qna-reply d-none" id="reply-{{ $q->id }}">
                                @auth
                                    @if(auth()->user()->isAdmin() || auth()->user()->isVet())
                                        <div class="card border-primary border-opacity-25 bg-primary bg-opacity-10">
                                            <div class="card-body p-3">
                                                <form method="POST" action="{{ route('qna.answers.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="question_id" value="{{ $q->id }}">
                                                    <label class="small fw-bold text-primary mb-1">Write your professional answer:</label>
                                                    <textarea class="form-control form-control-sm border-primary mb-2" name="body" rows="2" required></textarea>
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary btn-sm px-4 rounded-pill">Post Answer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning small mb-0 rounded-pill px-3 py-2 d-inline-block">
                                            <i class="fa-solid fa-lock me-1"></i> Only veterinarians can reply.
                                        </div>
                                    @endif
                                @else
                                    <div class="alert alert-info small mb-0 rounded-pill px-3 py-2 d-inline-block">
                                        <a href="{{ route('login') }}" class="fw-bold text-decoration-none">Log in</a> as a Vet to answer.
                                    </div>
                                @endauth
                            </div>

                        </div>
                    </div>
                @endforeach

                {{-- PAGINATION --}}
                <div class="d-flex justify-content-center mt-5">
                    {{ $questions->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Ask Form --}}
        <div class="col-lg-4">
            <div class="card qna-card mb-4 border-0 shadow-sm sticky-top" style="top: 20px; z-index: 1;">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h5 class="fw-bold mb-0">📝 Ask a Question</h5>
                </div>
                <div class="card-body">
                    <form id="qna-ask-form" method="POST" action="{{ route('qna.questions.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="small fw-bold text-muted mb-1">Pet Type <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm bg-light border-0 py-2" name="category_id" required>
                                <option value="">Select...</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="small fw-bold text-muted mb-1">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-sm bg-light border-0 py-2" placeholder="e.g. My cat isn't eating..." required>
                        </div>

                        <div class="mb-3">
                            <label class="small fw-bold text-muted mb-1">Details <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control form-control-sm bg-light border-0 py-2" rows="4" placeholder="Describe symptoms, duration, etc." required></textarea>
                        </div>

                        @guest
                            <div class="mb-3">
                                <label class="small fw-bold text-muted mb-1">Your Name</label>
                                <input type="text" name="guest_name" class="form-control form-control-sm bg-light border-0 py-2">
                            </div>
                        @endguest

                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-bold shadow-sm mt-2">
                            Submit Question
                        </button>
                    </form>
                </div>
            </div>

            {{-- Stats --}}
            <div class="card border-0 bg-white shadow-sm rounded-4 p-3 mb-4">
                <div class="d-flex justify-content-around text-center">
                    <div>
                        <h3 class="fw-bold text-primary mb-0">{{ $questions->total() }}</h3>
                        <small class="text-muted">Questions</small>
                    </div>
                    <div class="vr opacity-25"></div>
                    <div>
                        <h3 class="fw-bold text-success mb-0">{{ \App\Models\QnaQuestion::where('answer_count','>',0)->count() }}</h3>
                        <small class="text-muted">Solved</small>
                    </div>
                </div>
            </div>
            
            {{-- Safety --}}
            <div class="alert alert-warning border-0 d-flex align-items-center shadow-sm rounded-3">
                <i class="fa-solid fa-notes-medical fs-2 me-3 text-warning"></i>
                <div class="small">
                    <strong>Emergency?</strong><br>
                    This forum is for advice only. If your pet is in critical condition, visit a clinic immediately.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle Logic
    document.addEventListener('click', function (e) {
        if (e.target.closest('.qna-reply-toggle')) {
            let btn = e.target.closest('.qna-reply-toggle');
            let id = btn.getAttribute('data-question-id');
            document.getElementById('reply-' + id).classList.toggle('d-none');
        }
        if (e.target.closest('.qna-view-answers')) {
            let btn = e.target.closest('.qna-view-answers');
            let id = btn.getAttribute('data-question-id');
            let el = document.getElementById('answers-' + id);
            el.classList.toggle('d-none');
            
            // Text Toggle
            if(el.classList.contains('d-none')){
                btn.innerText = btn.innerText.replace('Hide', 'View');
            } else {
                btn.innerText = btn.innerText.replace('View', 'Hide');
            }
        }
    });
</script>
@endsection