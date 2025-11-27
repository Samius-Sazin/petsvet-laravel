<!-- Add Article Modal -->
<div class="modal fade" id="addArticleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            @if (session('add_article_success'))
                <script>
                    alert("Article added successfully");
                </script>
            @endif

            <form id="addArticleForm" method="POST" action="{{ route('articles.add') }}" enctype="multipart/form-data">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add New Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Article Title <span
                                class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control fs-5" placeholder="How to Care for Your Pet"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Category <span class="text-danger">*</span></label>
                        <input type="text" name="category" class="form-control fs-5" placeholder="Pet Care" required>
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Content <span class="text-danger">*</span></label>
                        <textarea name="content" rows="8" class="form-control fs-5" placeholder="Write your article content here..." required></textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Article Image <span
                                class="text-danger">*</span></label>
                        <input type="file" name="image" accept="image/*" class="form-control fs-5" required>
                        <small class="text-muted">Upload a single image for your article.</small>
                        <div class="mt-2" id="imagePreviewContainer"></div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fs-5">Add Article</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#addArticleForm');
        const imageInput = form.querySelector('input[name="image"]');
        const previewContainer = document.getElementById('imagePreviewContainer');

        // Image preview
        imageInput.addEventListener('change', (e) => {
            previewContainer.innerHTML = '';
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.width = '200px';
                    img.style.height = '200px';
                    img.style.objectFit = 'cover';
                    img.classList.add('rounded', 'shadow-sm');
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });

        // Prevent submitting if required fields are empty
        form.addEventListener('submit', function(e) {
            const title = form.querySelector('input[name="title"]').value.trim();
            const category = form.querySelector('input[name="category"]').value.trim();
            const content = form.querySelector('textarea[name="content"]').value.trim();
            const imageSelected = imageInput.files.length > 0;

            if (!title || !category || !content || !imageSelected) {
                e.preventDefault();
                alert("Please fill all required fields and upload an image.");
            }
        });
    });
</script>

