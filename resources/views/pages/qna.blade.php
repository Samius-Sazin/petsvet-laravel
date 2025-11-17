@extends('main')

@section('title', 'Q&A')

@section('content')
<style>
    .qna-hero {
        background: linear-gradient(90deg, #6ec3ff, #a8e3ff);
        border-radius: 18px;
        padding: 40px 30px;
        color: #003654;
        margin-bottom: 32px;
    }
    .qna-hero-title {
        font-weight: 700;
        font-size: 1.9rem;
    }
    .qna-hero-subtitle {
        font-size: 1rem;
        opacity: 0.9;
    }
    .qna-card {
        border-radius: 14px;
        border: none;
        box-shadow: 0 6px 16px rgba(0,0,0,0.06);
    }
    .qna-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.10);
        transition: 0.15s ease;
    }
    .pet-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #eaf8ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        font-size: 20px;
        color: #0074b8;
    }
    .badge-soft {
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 0.75rem;
    }
    .badge-dog { background: #e1f2ff; color: #005a88; }
    .badge-cat { background: #fff2d9; color: #a46400; }
    .badge-rabbit { background: #e6ffe9; color: #0e7a18; }
    .badge-other { background: #f5e0ff; color: #6a008a; }
    .qna-filter-btn {
        border-radius: 999px;
    }
    .qna-filter-btn.active {
        background-color: #0d6efd;
        color: #fff;
    }
    .qna-answer-box {
        background: #f7fbff;
        border-left: 4px solid #61b2ff;
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 0.9rem;
    }
    .qna-answer-meta {
        font-size: 0.8rem;
        color: #6b7280;
    }
    .qna-footer-actions .btn-link {
        padding-left: 0;
        padding-right: 10px;
        font-size: 0.8rem;
    }
    .qna-stats-box {
        border-radius: 12px;
        padding: 15px;
        background: #f7fcff;
        border: 1px solid #e2f1ff;
        font-size: 0.9rem;
    }
    .qna-stat-number {
        font-weight: 700;
        color: #007ec4;
    }
</style>

<div class="container py-4">

    {{-- HERO --}}
    <div class="qna-hero">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="qna-hero-title">
                    Ask Anything About Your Pet—We’re Here to Help ❤️🐾
                </h1>
                <p class="qna-hero-subtitle mb-0">
                    Share your pet’s questions with the PetsVets community. Get guidance on health, behavior,
                    nutrition and everyday care. This page is currently front-end only (no database yet).
                </p>
            </div>
            <div class="col-md-4 text-center mt-3 mt-md-0">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png"
                     alt="Pets" width="110">
            </div>
        </div>
    </div>

    <div class="row g-4">

        {{-- LEFT COLUMN: Search + Questions --}}
        <div class="col-lg-8">

            {{-- Search + Filters --}}
            <div class="card qna-card mb-4">
                <div class="card-body">
                    <div class="row g-2 align-items-center mb-2">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-search"></i>
                                </span>
                                <input type="text" class="form-control" id="qna-search"
                                       placeholder="Search questions (e.g. dog vomiting, kitten vaccines)">
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <button type="button" id="qna-clear-filters"
                                    class="btn btn-outline-secondary w-100 w-md-auto">
                                Clear filters
                            </button>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button"
                                class="btn btn-sm btn-outline-primary qna-filter-btn active"
                                data-filter="all">
                            All pets
                        </button>
                        <button type="button"
                                class="btn btn-sm btn-outline-primary qna-filter-btn"
                                data-filter="Dog">
                            🐶 Dogs
                        </button>
                        <button type="button"
                                class="btn btn-sm btn-outline-primary qna-filter-btn"
                                data-filter="Cat">
                            🐱 Cats
                        </button>
                        <button type="button"
                                class="btn btn-sm btn-outline-primary qna-filter-btn"
                                data-filter="Rabbit">
                            🐰 Rabbits
                        </button>
                        <button type="button"
                                class="btn btn-sm btn-outline-primary qna-filter-btn"
                                data-filter="Other">
                            🐾 Other pets
                        </button>
                    </div>
                </div>
            </div>

            {{-- Question list --}}
            <div id="qna-question-list">

                {{-- QUESTION 1 (Dog, answered) --}}
                <div class="card qna-card mb-4 qna-question-card"
                     data-pet-type="Dog"
                     data-answer-count="1">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="pet-icon"><i class="fa-solid fa-dog"></i></div>
                            <div>
                                <h5 class="mb-1">How often should my 3-month-old puppy receive vaccines?</h5>
                                <div class="small text-muted">
                                    <span class="badge badge-soft badge-dog">Dog</span>
                                    <span class="ms-2">Asked by <strong>Rafi</strong> · 12 Nov 2025</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted small mb-2">
                            Puppies usually follow a 3–4 week vaccination schedule until around 16 weeks of age...
                        </p>

                        {{-- Actions --}}
                        <div class="d-flex align-items-center qna-footer-actions">
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-reply-toggle"
                                    data-question-id="q1">
                                Reply
                            </button>
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-view-answers"
                                    data-question-id="q1">
                                View answers (1)
                            </button>
                            <span class="badge bg-success-subtle text-success border border-success-subtle ms-1 small">
                                Answered
                            </span>
                        </div>

                        {{-- Answers list --}}
                        <div class="mt-2 qna-answers d-none" id="answers-q1">
                            <div class="qna-answer-box mb-2">
                                <div class="qna-answer-meta mb-1">
                                    Answer by <strong>Dr. Sara (Vet)</strong> · 1 recommended
                                </div>
                                Puppies need core vaccines every 3–4 weeks until 16 weeks of age. The exact schedule
                                depends on vaccine type and your local disease risk. Your vet will give you a calendar—
                                try to follow those dates closely and avoid missing boosters.
                            </div>
                        </div>

                        {{-- Reply form --}}
                        <div class="mt-2 qna-reply d-none" id="reply-q1">
                            <form class="qna-reply-form" data-question-id="q1">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               placeholder="Your name (optional)"
                                               name="answer_name">
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control form-control-sm"
                                                  name="answer_body"
                                                  rows="2"
                                                  placeholder="Write your answer..." required></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Post answer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- QUESTION 2 (Cat, answered with 2 answers) --}}
                <div class="card qna-card mb-4 qna-question-card"
                     data-pet-type="Cat"
                     data-answer-count="2">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="pet-icon"><i class="fa-solid fa-cat"></i></div>
                            <div>
                                <h5 class="mb-1">My indoor cat stopped eating. When is it an emergency?</h5>
                                <div class="small text-muted">
                                    <span class="badge badge-soft badge-cat">Cat</span>
                                    <span class="ms-2">Asked by <strong>Meera</strong> · 10 Nov 2025</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted small mb-2">
                            She used to eat normally, but for the last day she barely touches her food. No visible injuries...
                        </p>

                        <div class="d-flex align-items-center qna-footer-actions">
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-reply-toggle"
                                    data-question-id="q2">
                                Reply
                            </button>
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-view-answers"
                                    data-question-id="q2">
                                View answers (2)
                            </button>
                            <span class="badge bg-success-subtle text-success border border-success-subtle ms-1 small">
                                Answered
                            </span>
                        </div>

                        <div class="mt-2 qna-answers d-none" id="answers-q2">
                            <div class="qna-answer-box mb-2">
                                <div class="qna-answer-meta mb-1">
                                    Answer by <strong>Dr. Imran (Vet)</strong>
                                </div>
                                If a cat hasn’t eaten for more than 24 hours, it can become serious quickly. Call
                                your vet as soon as possible and ask for an urgent appointment, especially if you see
                                vomiting, hiding, or weakness.
                            </div>
                            <div class="qna-answer-box mb-2">
                                <div class="qna-answer-meta mb-1">
                                    Answer by <strong>Rina (Cat owner)</strong>
                                </div>
                                My cat went off food once due to stress after a house change. Try offering very
                                smelly wet food, but still contact a vet if she continues not eating.
                            </div>
                        </div>

                        <div class="mt-2 qna-reply d-none" id="reply-q2">
                            <form class="qna-reply-form" data-question-id="q2">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               placeholder="Your name (optional)"
                                               name="answer_name">
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control form-control-sm"
                                                  name="answer_body"
                                                  rows="2"
                                                  placeholder="Write your answer..." required></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Post answer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- QUESTION 3 (Rabbit, no answers yet) --}}
                <div class="card qna-card mb-4 qna-question-card"
                     data-pet-type="Rabbit"
                     data-answer-count="0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="pet-icon"><i class="fa-solid fa-paw"></i></div>
                            <div>
                                <h5 class="mb-1">My rabbit is grinding its teeth loudly. Is it pain?</h5>
                                <div class="small text-muted">
                                    <span class="badge badge-soft badge-rabbit">Rabbit</span>
                                    <span class="ms-2">Asked by <strong>Guest user</strong> · 9 Nov 2025</span>
                                </div>
                            </div>
                        </div>

                        <p class="text-muted small mb-2">
                            The grinding sounds louder than normal “purring” and happens when he is sitting still.
                        </p>

                        <div class="d-flex align-items-center qna-footer-actions">
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-reply-toggle"
                                    data-question-id="q3">
                                Reply
                            </button>
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-view-answers disabled text-muted"
                                    data-question-id="q3" disabled>
                                View answers (0)
                            </button>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle ms-1 small">
                                Awaiting answers
                            </span>
                        </div>

                        <div class="mt-2 qna-answers d-none" id="answers-q3">
                            <div class="qna-answer-box mb-2">
                                <em class="qna-answer-meta">No answers yet. Be the first to share your experience.</em>
                            </div>
                        </div>

                        <div class="mt-2 qna-reply d-none" id="reply-q3">
                            <form class="qna-reply-form" data-question-id="q3">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               placeholder="Your name (optional)"
                                               name="answer_name">
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control form-control-sm"
                                                  name="answer_body"
                                                  rows="2"
                                                  placeholder="Write your answer..." required></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Post answer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> {{-- /qna-question-list --}}
        </div>

        {{-- RIGHT COLUMN: Ask Question + Stats + Info --}}
        <div class="col-lg-4">
            <div class="card qna-card mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3">Ask a new question 📝</h5>
                    <form id="qna-ask-form">
                        <div class="mb-3">
                            <label class="small mb-1">Pet type <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" id="ask_pet_type" required>
                                <option value="">Select pet type</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="Other">Other / Exotic</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Question title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                   id="ask_title"
                                   placeholder="Example: My puppy has diarrhea, what should I do?"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Details <span class="text-danger">*</span></label>
                            <textarea class="form-control form-control-sm"
                                      id="ask_body"
                                      rows="4"
                                      placeholder="Describe your pet's age, symptoms, how long it’s been happening, and any treatment given."
                                      required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Your email (for future answer updates)</label>
                            <input type="email" class="form-control form-control-sm"
                                   id="ask_email"
                                   placeholder="Optional · used to notify you when someone answers">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-sm">
                            Submit question
                        </button>
                        <div class="form-text small mt-2">
                            This demo does not store questions in a database yet. Email notifications will
                            be enabled when backend is added.
                        </div>
                    </form>
                </div>
            </div>

            <div class="qna-stats-box mb-4">
                <div class="d-flex justify-content-between mb-1">
                    <span>Total questions</span>
                    <span class="qna-stat-number" id="stat-total">3</span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Answered questions</span>
                    <span class="qna-stat-number" id="stat-answered">2</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Awaiting answers</span>
                    <span class="qna-stat-number" id="stat-unanswered">1</span>
                </div>
            </div>

            <div class="card qna-card">
                <div class="card-body small">
                    <h6 class="fw-semibold mb-2">Safety note</h6>
                    <p class="mb-1">
                        Answers on PetsVets Q&amp;A are for general information only and may not apply to every case.
                        They do not replace a physical examination by a veterinarian.
                    </p>
                    <p class="mb-0">
                        If your pet has difficulty breathing, continuous vomiting, collapse, seizures or heavy
                        bleeding, please contact an emergency vet clinic immediately.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    const searchInput = document.getElementById('qna-search');
    const filterButtons = document.querySelectorAll('.qna-filter-btn');
    const clearFiltersBtn = document.getElementById('qna-clear-filters');
    const askForm = document.getElementById('qna-ask-form');
    const questionList = document.getElementById('qna-question-list');
    const statTotal = document.getElementById('stat-total');
    const statAnswered = document.getElementById('stat-answered');
    const statUnanswered = document.getElementById('stat-unanswered');
    let activeFilter = 'all';

    function getQuestionCards() {
        return document.querySelectorAll('.qna-question-card');
    }

    function updateStats() {
        const cards = getQuestionCards();
        let total = 0, answered = 0;
        cards.forEach(card => {
            total++;
            const count = parseInt(card.getAttribute('data-answer-count') || '0', 10);
            if (count > 0) answered++;
        });
        statTotal.textContent = total;
        statAnswered.textContent = answered;
        statUnanswered.textContent = total - answered;
    }

    function applyFilters() {
        const cards = getQuestionCards();
        const term = (searchInput.value || '').toLowerCase();

        cards.forEach(card => {
            const pet = card.getAttribute('data-pet-type');
            const text = card.innerText.toLowerCase();

            const matchFilter = activeFilter === 'all' || pet === activeFilter;
            const matchSearch = !term || text.includes(term);

            if (matchFilter && matchSearch) {
                card.classList.remove('d-none');
            } else {
                card.classList.add('d-none');
            }
        });
    }

    // Filter buttons
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilter = btn.getAttribute('data-filter');
            applyFilters();
        });
    });

    // Search
    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    // Clear filters
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', () => {
            activeFilter = 'all';
            searchInput.value = '';
            filterButtons.forEach(b => b.classList.remove('active'));
            const allBtn = document.querySelector('.qna-filter-btn[data-filter="all"]');
            if (allBtn) allBtn.classList.add('active');
            applyFilters();
        });
    }

    // Toggle reply form & answers using event delegation
    document.addEventListener('click', function (e) {
        // Reply toggle
        if (e.target.classList.contains('qna-reply-toggle')) {
            const qid = e.target.getAttribute('data-question-id');
            const replyBox = document.getElementById('reply-' + qid);
            if (replyBox) replyBox.classList.toggle('d-none');
        }

        // View answers
        if (e.target.classList.contains('qna-view-answers') &&
            !e.target.classList.contains('disabled')) {
            const qid = e.target.getAttribute('data-question-id');
            const answersBox = document.getElementById('answers-' + qid);
            if (answersBox) {
                const isHidden = answersBox.classList.contains('d-none');
                answersBox.classList.toggle('d-none');
                e.target.textContent = isHidden
                    ? e.target.textContent.replace('View', 'Hide')
                    : e.target.textContent.replace('Hide', 'View');
            }
        }
    });

    // Handle posting a new answer (front-end only)
    document.addEventListener('submit', function (e) {
        if (!e.target.classList.contains('qna-reply-form')) return;
        e.preventDefault();

        const form = e.target;
        const qid = form.getAttribute('data-question-id');
        const name = (form.elements['answer_name'].value || 'Guest user').trim();
        const body = form.elements['answer_body'].value.trim();
        if (!body) return;

        const answersBox = document.getElementById('answers-' + qid);
        if (!answersBox) return;

        // Remove "no answers yet" placeholder if exists
        const placeholder = answersBox.querySelector('.qna-answer-box em');
        if (placeholder) {
            answersBox.innerHTML = '';
        }

        const answerDiv = document.createElement('div');
        answerDiv.className = 'qna-answer-box mb-2';
        answerDiv.innerHTML = `
            <div class="qna-answer-meta mb-1">
                Answer by <strong>${name}</strong> · just now
            </div>
            ${body}
        `;
        answersBox.appendChild(answerDiv);

        // Make sure answers are visible when new one posted
        answersBox.classList.remove('d-none');

        // Hide the reply form after posting
        const replyContainer = form.closest('.qna-reply');
        if (replyContainer) {
            replyContainer.classList.add('d-none');
        }

        // Update per-question answer count + button label + badges
        const card = form.closest('.qna-question-card');
        if (card) {
            let current = parseInt(card.getAttribute('data-answer-count') || '0', 10);
            current++;
            card.setAttribute('data-answer-count', current.toString());

            const viewBtn = card.querySelector('.qna-view-answers');
            if (viewBtn) {
                viewBtn.classList.remove('disabled', 'text-muted');
                viewBtn.removeAttribute('disabled');
                viewBtn.textContent = `Hide answers (${current})`;
            }

            const statusBadge = card.querySelector('.badge.bg-warning-subtle, .badge.bg-success-subtle');
            if (statusBadge && statusBadge.classList.contains('bg-warning-subtle')) {
                statusBadge.classList.remove('bg-warning-subtle', 'text-warning', 'border-warning-subtle');
                statusBadge.classList.add('bg-success-subtle', 'text-success', 'border-success-subtle');
                statusBadge.textContent = 'Answered';
            }
        }

        // Reset form fields
        form.reset();

        // Update global stats (question counts)
        updateStats();
    });

    // Ask question form (front-end only)
    if (askForm) {
        askForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const pet = document.getElementById('ask_pet_type').value;
            const title = document.getElementById('ask_title').value.trim();
            const body = document.getElementById('ask_body').value.trim();
            // email is collected but not used yet
            const email = document.getElementById('ask_email').value.trim();

            if (!pet || !title || !body) return;

            const newId = 'q' + (getQuestionCards().length + 1);
            const petBadgeClass =
                pet === 'Dog' ? 'badge-dog' :
                pet === 'Cat' ? 'badge-cat' :
                pet === 'Rabbit' ? 'badge-rabbit' :
                'badge-other';

            const newCardHtml = `
                <div class="card qna-card mb-4 qna-question-card"
                     data-pet-type="${pet}"
                     data-answer-count="0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="pet-icon"><i class="fa-solid fa-paw"></i></div>
                            <div>
                                <h5 class="mb-1"></h5>
                                <div class="small text-muted">
                                    <span class="badge badge-soft ${petBadgeClass}">${pet}</span>
                                    <span class="ms-2">Asked just now</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted small mb-2"></p>
                        <div class="d-flex align-items-center qna-footer-actions">
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-reply-toggle"
                                    data-question-id="${newId}">
                                Reply
                            </button>
                            <button type="button"
                                    class="btn btn-link text-decoration-none qna-view-answers disabled text-muted"
                                    data-question-id="${newId}" disabled>
                                View answers (0)
                            </button>
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle ms-1 small">
                                Awaiting answers
                            </span>
                        </div>
                        <div class="mt-2 qna-answers d-none" id="answers-${newId}">
                            <div class="qna-answer-box mb-2">
                                <em class="qna-answer-meta">No answers yet. Be the first to reply.</em>
                            </div>
                        </div>
                        <div class="mt-2 qna-reply d-none" id="reply-${newId}">
                            <form class="qna-reply-form" data-question-id="${newId}">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text"
                                               class="form-control form-control-sm"
                                               placeholder="Your name (optional)"
                                               name="answer_name">
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control form-control-sm"
                                                  name="answer_body"
                                                  rows="2"
                                                  placeholder="Write your answer..." required></textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Post answer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>`;

            const wrapper = document.createElement('div');
            wrapper.innerHTML = newCardHtml.trim();
            const newCard = wrapper.firstElementChild;

            newCard.querySelector('h5').textContent = title;
            newCard.querySelector('p.text-muted').textContent = body;

            questionList.prepend(newCard);
            askForm.reset();

            updateStats();
            applyFilters();
        });
    }

    // Initial stats + filter
    updateStats();
    applyFilters();
})();
</script>
@endsection
