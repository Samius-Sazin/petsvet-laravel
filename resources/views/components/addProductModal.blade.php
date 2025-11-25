<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            @if (session('add_product_success'))
                <script>
                    alert("Product added successfully");
                    // showNotification('{{ session('success') }}', 'success');
                </script>
            @endif

            <form id="addProductForm" method="POST" action="{{ route('products.add') }}" enctype="multipart/form-data">
                @csrf

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Product Title <span
                                class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control fs-5" placeholder="Cat Food 500gm"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Category <span class="text-danger">*</span></label>
                        <input type="text" name="category" class="form-control fs-5" placeholder="Food" required>
                    </div>

                    <!-- Price & Offer -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label fw-semibold fs-5">Price (BDT) <span
                                    class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control fs-5" placeholder="800" required>
                        </div>
                        <div class="col">
                            <label class="form-label fw-semibold fs-5">Offer (%)</label>
                            <input type="number" name="offer" class="form-control fs-5" placeholder="10"
                                value="0">
                        </div>
                        <div class="col">
                            <label class="form-label fw-semibold fs-5">Quantity</label>
                            <input type="number" name="quantity" class="form-control fs-5" placeholder="20"
                                value="0">
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Details <span class="text-danger">*</span></label>
                        <textarea name="details" rows="4" class="form-control fs-5" placeholder="Enter product details..." required></textarea>
                    </div>

                    <!-- Tags -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Tags</label>
                        <input type="text" name="tags" class="form-control fs-5"
                            placeholder="e.g. cat, food, premium">
                        <small class="text-muted">Separate tags with commas.</small>
                    </div>

                    <!-- Images -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Product Images <span
                                class="text-danger">*</span></label>
                        <input type="file" name="images[]" accept="image/*" class="form-control fs-5" multiple
                            required>
                        <small class="text-muted">You can upload multiple images.</small>
                        <div class="row mt-2" id="imagePreviewContainer"></div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fs-5">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#addProductForm');
        const imagesInput = form.querySelector('input[name="images[]"]');
        const previewContainer = document.getElementById('imagePreviewContainer');

        // Image preview
        imagesInput.addEventListener('change', (e) => {
            previewContainer.innerHTML = '';
            const files = e.target.files;
            if (files.length > 0) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.objectFit = 'cover';
                        img.classList.add('me-2', 'mb-2', 'rounded');
                        previewContainer.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                });
            }
        });

        // Prevent submitting if required fields are empty
        form.addEventListener('submit', function(e) {
            const title = form.querySelector('input[name="title"]').value.trim();
            const category = form.querySelector('input[name="category"]').value.trim();
            const price = form.querySelector('input[name="price"]').value.trim();
            const details = form.querySelector('textarea[name="details"]').value.trim();
            const imagesSelected = imagesInput.files.length > 0;

            if (!title || !category || !price || !details || !imagesSelected) {
                e.preventDefault();
                alert("Please fill all required fields and upload at least one image.");
            }
        });
    });
</script>
