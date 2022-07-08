<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Pendukung Keputusan - @yield('title')</title>
    @include('dashboard.partials.head')
</head>

<body>

    @include('dashboard.partials.sidebarApp')

<main class="content">

    @include('dashboard.partials.navbar')

    @yield('content')

    @include('dashboard.partials.footer')
</main>

    @include('dashboard.partials.script')

</body>
</html>
