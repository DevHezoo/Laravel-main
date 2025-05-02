<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<title>{{session('Seo')->meta_title}}</title>
@include('frontend.body.header')
</head>

  <body style="user-select: none;">
<!--     <script>
      confetti.start();
    </script> -->
@include('frontend.body.menu')

    <!-- Content -->
    @yield('dashboard')

    <!-- Content -->
    @yield('profile')

    <!-- Content -->
    @yield('contact')

    <!-- Content -->
    @yield('articles')

    <!-- Content -->
    @yield('article')

    <!-- Content -->
    @yield('live')

    <!-- Content -->
    @yield('quiz')

    <!-- Content -->
    @yield('video')

    <!-- Content -->
    @yield('room')

@include('frontend.body.footer')
@include('frontend.body.init')
</body>
</html>