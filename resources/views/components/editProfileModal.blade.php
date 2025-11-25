<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            @if (session('update_profile_success'))
                <script>
                    alert("Profile updated successfully");
                    // showNotification('{{ session('success') }}', 'success');
                </script>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    @php $user = auth()->user(); @endphp

                    <!-- Profile Image -->
                    <div class="d-flex justify-content-center mb-4">
                        <div class="position-relative" style="width: 140px;">
                            <img src="{{ $user->photo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                class="rounded-circle shadow-sm" style="width:140px; height:140px; object-fit:cover;"
                                alt="Profile Image">

                            <button type="button"
                                class="btn btn-primary btn-sm rounded-circle position-absolute d-flex justify-content-center align-items-center"
                                style="bottom: 8px; right: 8px; width:36px; height:36px;"
                                onclick="document.getElementById('modalProfilePhotoInput').click()">
                                <i class="fa-solid fa-camera"></i>
                            </button>

                            <input type="file" id="modalProfilePhotoInput" name="photo" accept="image/*"
                                class="d-none">
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Name</label>
                        <input type="text" name="name" class="form-control fs-5" value="{{ $user->name }}">
                    </div>

                    <!-- Email (readonly) -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Email</label>
                        <input type="email" class="form-control fs-5" value="{{ $user->email }}" disabled>
                        <small class="text-muted">Email cannot be changed.</small>
                    </div>

                    <!-- Location -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Location</label>
                        <input type="text" name="location" class="form-control fs-5" value="{{ $user->location }}"
                            placeholder="Dhaka, Bangladesh">
                    </div>

                    <!-- Bio -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold fs-5">Bio</label>
                        <textarea class="form-control fs-5" name="bio" rows="3" placeholder="Tell us something about yourself!">{{ $user->bio }}</textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fs-5">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#editProfileModal form');
        const modalEl = document.getElementById('editProfileModal');
        const modal = new bootstrap.Modal(modalEl);

        const user = @json(auth()->user());
        const initialData = {
            name: user.name || '',
            location: user.location || '',
            bio: user.bio || '',
            photo: ''
        };

        const photoInput = form.querySelector('input[name="photo"]');
        const photoImg = form.querySelector('img');

        // Preview image when selected
        photoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    photoImg.src = e.target.result; // update image preview
                };
                reader.readAsDataURL(file);
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const name = form.querySelector('input[name="name"]').value.trim();
            const location = form.querySelector('input[name="location"]').value.trim();
            const bio = form.querySelector('textarea[name="bio"]').value.trim();
            const photoChanged = photoInput.files.length > 0;

            if (name === initialData.name &&
                location === initialData.location &&
                bio === initialData.bio &&
                !photoChanged
            ) {
                modal.hide();
                showNotification('No changes detected!', 'primary');
            } else {
                form.submit();
            }
        });
    });
</script>
