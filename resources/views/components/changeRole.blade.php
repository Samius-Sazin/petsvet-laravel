@props(['role'])

@if ($role === 0)
    <div class="card shadow-sm border p-4 mb-4">
        <h4 class="fw-bold mb-3 fs-2 text-danger">Change User Role</h4>

        @if (session('success'))
            <script>
                showNotification('{{ session('success') }}', 'success');
            </script>
        @endif

        <form action="{{ route('profile.updateRole') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-5">
                <label class="form-label fw-semibold fs-5">User Email</label>
                <input type="email" name="email" class="form-control fs-5" required placeholder="user@example.com">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold fs-5">Select Role</label>
                <select name="role" class="form-select fs-5" required>
                    <option value="">-- Select Role --</option>
                    <option value="0">Admin</option>
                    <option value="2">Veterinary</option>
                    <option value="1">User</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa-solid fa-user-gear me-1"></i> Update Role
                </button>
            </div>
        </form>
    </div>
@endif
