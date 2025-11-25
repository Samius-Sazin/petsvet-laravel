@props(['role'])

@if ($role === 0)
    <div class="card shadow-sm border p-4 mb-4 bg-light">
        <h4 class="fw-bold mb-3 fs-2 text-danger">Change User Role</h4>

        @if (session('update_user_role_success'))
            <script>
                alert("user role changed successfully");
                // showNotification('{{ session('success') }}', 'success');
            </script>
        @endif

        <div class="d-flex justify-content-center">
            <form action="{{ route('profile.updateRole') }}" method="POST" class="d-flex flex-column gap-3"
                style="max-width: 700px; width: 100%;">
                @csrf
                @method('PUT')

                <div>
                    <label class="form-label fw-semibold fs-5">User Email</label>
                    <input type="email" name="email" class="form-control fs-5" required
                        placeholder="user@example.com">
                </div>

                <div>
                    <label class="form-label fw-semibold fs-5">Select Role</label>
                    <select name="role" class="form-select fs-5" required>
                        <option value="">Select Role</option>
                        <option value="0">Admin</option>
                        <option value="2">Veterinary</option>
                        <option value="1">User</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-user-gear me-1"></i> Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
@endif
