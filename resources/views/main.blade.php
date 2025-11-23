<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- favicon png format --}}
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png" style="border-radius: 50%">

    {{-- font awsome kit --}}
    <script src="https://kit.fontawesome.com/{{ config('app.font_awesome_kit') }}.js" crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Firebase JS SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js"></script>

    <title>PetsVet @yield('title')</title>

</head>

<body>
    @include('common.components.navbar')

    <div style="margin-bottom: 95px;"></div>

    <main>
        @yield('content')
    </main>

    @include('common.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script>
        const firebaseConfig = {
            apiKey: "{{ config('app.firebase.api_key') }}",
            authDomain: "{{ config('app.firebase.auth_domain') }}",
            projectId: "{{ config('app.firebase.project_id') }}",
            storageBucket: "{{ config('app.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('app.firebase.messaging_sender_id') }}",
            appId: "{{ config('app.firebase.app_id') }}",
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        function loginWithGoogle() {
            const btn = document.getElementById('googleLoginBtn');
            btn.disabled = true;
            const provider = new firebase.auth.GoogleAuthProvider();

            auth.signInWithPopup(provider)
                .then((result) => {
                    const user = result.user;
                    return fetch('/auth/firebase-login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            uid: user.uid,
                            name: user.displayName,
                            email: user.email,
                            photo: user.photoURL
                        })
                    });
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '/';
                    } else {
                        btn.disabled = false;
                        alert('Login failed!');
                    }
                })
                .catch((error) => {
                    console.log(error);
                    btn.disabled = false;
                });
        }

        function logoutUser() {
            firebase.auth().signOut().then(() => {
                document.getElementById('logoutForm').submit();
            }).catch((error) => {
                console.error("Firebase logout error:", error);
                document.getElementById('logoutForm').submit();
            });
        }
    </script>

</body>

</html>
