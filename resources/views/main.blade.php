<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    @vite('resources/css/app.css')

</head>
<body>
   <div class="main-layout">
     @include('partials.header')
     <main>
         @yield('content')
     </main>
     @include('partials.footer')
   </div>
</body>
</html>
