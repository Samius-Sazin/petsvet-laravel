<!-- Article Detail Modal -->
<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content d-flex flex-column" style="min-height: 80vh; background-color: #fff;">
            <div class="modal-body flex-grow-1" style="overflow-y: auto; background-color: #fff;">
                <img id="modalArticleImage" src="" alt="Article Image" class="img-fluid rounded mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
                <p id="modalArticleCategory" class="text-primary small mb-2 fw-semibold"></p>
                <h2 id="modalArticleTitle" class="mb-3"></h2>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <p id="modalArticleDate" class="text-muted small mb-0"></p>
                    <span class="text-muted">•</span>
                    <p id="modalArticleAuthor" class="text-muted small mb-0">By <span id="modalArticleAuthorName"></span></p>
                </div>
                <div id="modalArticleContent" class="article-content" style="line-height: 1.8; color: #333; white-space: pre-wrap;"></div>
            </div>
            <div class="modal-footer border-0" style="position: sticky; bottom: 0; z-index: 10; background-color: #fff; padding: 12px 20px; border-top: 1px solid rgba(0, 0, 0, 0.1);">
                <div class="d-flex align-items-center gap-3 w-100">
                    @auth
                        <button type="button" class="btn p-0 border-0 bg-transparent article-reaction-btn" data-reaction="love" style="color: #262626; display: flex; align-items: center;">
                            <span id="loveIcon" style="display: inline-flex; align-items: center;">
                                <svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24" id="likeIconSvg"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>
                            </span>
                            <span id="loveCount" class="text-dark ms-2" style="font-size: 14px; font-weight: 400;">0</span>
                        </button>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <span id="loveCount" class="text-dark" style="font-size: 14px; font-weight: 400;">0</span>
                            <span class="text-muted small">likes</span>
                            <span class="text-muted">•</span>
                            <a href="{{ route('home') }}" class="text-primary small text-decoration-none">Login to like</a>
                        </div>
                    @endauth
                    <button type="button" class="btn p-0 border-0 bg-transparent article-reaction-btn" data-reaction="share" style="color: #262626; margin-left: auto;">
                        <svg aria-label="Share" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24"><title>Share</title><path d="M13.973 20.046 21.77 6.928C22.8 5.195 21.55 3 19.535 3H4.466C2.138 3 .984 5.825 2.646 7.456l4.842 4.752 1.723 7.121c.548 2.266 3.571 2.721 4.762.717Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"></path><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="7.488" x2="15.515" y1="12.208" y2="7.641"></line></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        // Initialize modal functionality only once
        if (window.articleModalInitialized) {
            return;
        }
        window.articleModalInitialized = true;

        // Get CSRF token helper function
        function getCsrfToken() {
            const metaTag = document.querySelector('meta[name="csrf-token"]');
            if (metaTag) {
                return metaTag.getAttribute('content');
            }
            // Fallback: try to get from cookie (XSRF-TOKEN)
            const cookies = document.cookie.split(';');
            for (let cookie of cookies) {
                const [name, value] = cookie.trim().split('=');
                if (name === 'XSRF-TOKEN') {
                    return decodeURIComponent(value);
                }
            }
            return '';
        }

        let modal = null;
        let currentArticleId = null;

        function initModal() {
            const modalElement = document.getElementById('articleModal');
            if (!modalElement) return false;
            
            if (!modal) {
                modal = new bootstrap.Modal(modalElement);
            }
            return true;
        }

        function showArticleModal(card) {
            if (!initModal()) {
                console.error('Modal element not found');
                return;
            }

            const articleId = card.getAttribute('data-article-id');
            const image = card.getAttribute('data-article-image');
            const category = card.getAttribute('data-article-category');
            const title = card.getAttribute('data-article-title');
            const date = card.getAttribute('data-article-date');
            const content = card.getAttribute('data-article-content');
            const author = card.getAttribute('data-article-author') || 'Unknown';
            const likesCount = parseInt(card.getAttribute('data-article-likes-count')) || 0;
            const isLiked = card.getAttribute('data-article-is-liked') === 'true';

            currentArticleId = articleId;

            const modalImage = document.getElementById('modalArticleImage');
            const modalCategory = document.getElementById('modalArticleCategory');
            const modalTitle = document.getElementById('modalArticleTitle');
            const modalDate = document.getElementById('modalArticleDate');
            const modalAuthorName = document.getElementById('modalArticleAuthorName');
            const modalContent = document.getElementById('modalArticleContent');

            if (modalImage) modalImage.src = image;
            if (modalCategory) modalCategory.textContent = category;
            if (modalTitle) modalTitle.textContent = title;
            if (modalDate) modalDate.textContent = date;
            if (modalAuthorName) modalAuthorName.textContent = author;
            if (modalContent) modalContent.textContent = content;

            // Update like button state (only if user is authenticated)
            const loveBtn = document.querySelector('.article-reaction-btn[data-reaction="love"]');
            const loveIcon = document.getElementById('loveIcon');
            const loveCount = document.getElementById('loveCount');

            if (loveCount) {
                loveCount.textContent = likesCount || '0';
            }

            if (loveBtn && loveIcon) {
                if (isLiked) {
                    loveBtn.classList.add('active');
                    loveIcon.innerHTML = '<svg class="x1lliihq x1n2onr6 xxk16z8" fill="#ed4956" height="24" role="img" viewBox="0 0 48 48" width="24" id="likeIconSvg"><title>Unlike</title><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>';
                } else {
                    loveBtn.classList.remove('active');
                    loveIcon.innerHTML = '<svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24" id="likeIconSvg"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>';
                }
            }

            modal.show();
        }

        // Wait for DOM to be ready
        function setupEventListeners() {
            // Handle clicks on article titles
            document.addEventListener('click', function(e) {
                const title = e.target.closest('.article-title');
                if (title) {
                    e.preventDefault();
                    e.stopPropagation();
                    const articleCard = title.closest('.article-card');
                    if (articleCard) {
                        showArticleModal(articleCard);
                    }
                }
            });

            // Handle clicks on "Read More" links
            document.addEventListener('click', function(e) {
                const readMore = e.target.closest('.article-read-more');
                if (readMore) {
                    e.preventDefault();
                    e.stopPropagation();
                    const articleCard = readMore.closest('.article-card');
                    if (articleCard) {
                        showArticleModal(articleCard);
                    }
                }
            });
        }

        // Initialize when DOM is ready and Bootstrap is loaded
        function initializeAll() {
            setupEventListeners();
            
            // Handle reaction button clicks
            document.addEventListener('click', function(e) {
            const btn = e.target.closest('.article-reaction-btn');
            if (!btn) return;

            e.preventDefault();
            const reaction = btn.getAttribute('data-reaction');
            const articleTitle = document.getElementById('modalArticleTitle').textContent;
            const loveIcon = document.getElementById('loveIcon');
            const loveCount = document.getElementById('loveCount');
            
            if (reaction === 'love') {
                // Check if user is authenticated (like button only exists for authenticated users)
                if (!loveIcon) {
                    // User is not authenticated, redirect to login or show message
                    if (confirm('You need to be logged in to like articles. Would you like to go to the home page to login?')) {
                        window.location.href = '{{ route("home") }}';
                    }
                    return;
                }

                if (!currentArticleId) {
                    alert('Article ID not found');
                    return;
                }

                // Disable button during request
                btn.disabled = true;

                // Get CSRF token
                const csrfToken = getCsrfToken();
                if (!csrfToken) {
                    alert('CSRF token not found. Please refresh the page and try again.');
                    btn.disabled = false;
                    return;
                }

                // Make AJAX request to toggle like
                fetch(`/articles/${currentArticleId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => {
                            throw new Error(data.message || `HTTP error! status: ${response.status}`);
                        }).catch(() => {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Update UI based on response
                        if (data.is_liked) {
                            btn.classList.add('active');
                            loveIcon.innerHTML = '<svg class="x1lliihq x1n2onr6 xxk16z8" fill="#ed4956" height="24" role="img" viewBox="0 0 48 48" width="24" id="likeIconSvg"><title>Unlike</title><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>';
                        } else {
                            btn.classList.remove('active');
                            loveIcon.innerHTML = '<svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24" id="likeIconSvg"><title>Like</title><path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z"></path></svg>';
                        }
                        loveCount.textContent = data.likes_count || '0';

                        // Update the card data attributes for consistency
                        const articleCard = document.querySelector(`[data-article-id="${currentArticleId}"]`);
                        if (articleCard) {
                            articleCard.setAttribute('data-article-likes-count', data.likes_count);
                            articleCard.setAttribute('data-article-is-liked', data.is_liked ? 'true' : 'false');
                        }
                    } else {
                        alert(data.message || 'Failed to toggle like');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert(error.message || 'An error occurred. Please try again.');
                })
                .finally(() => {
                    btn.disabled = false;
                });
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
        }

        // Wait for DOM and Bootstrap
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                // Wait a bit for Bootstrap to be available
                setTimeout(initializeAll, 100);
            });
        } else {
            // DOM already loaded, wait for Bootstrap
            setTimeout(initializeAll, 100);
        }
    })();
</script>

