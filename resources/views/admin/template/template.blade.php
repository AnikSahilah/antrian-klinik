<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- FontAwesome JS -->
    <script defer src="{{ asset('assets2/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets2/css/portal.css') }}">

    <!-- TinyMCE -->
    <script src="{{ asset('assets2/js/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tiny',
            plugins: 'powerpaste advcode table lists checklist link image media',
            toolbar: 'undo redo | blocks | bold italic | bullist numlist checklist | code | table | link image media'
        });
    </script>
</head>

<body class="app">

    {{-- Header --}}
    @include('admin.layout.header')

    {{-- Wrapper --}}
    <div class="app-wrapper">
        @yield('content')
    </div>

    <!-- Bootstrap & Plugins -->
    <script src="{{ asset('assets2/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/app.js') }}"></script>
    <script src="{{ asset('assets2/js/lazysizes.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Active Nav Highlight Script -->
    <script>
        var currentUrl = window.location.href;
        var navLinks = document.querySelectorAll("#app-nav-main .nav-link");

        navLinks.forEach(function(link) {
            var linkHref = link.getAttribute("href");

            if (
                (currentUrl.includes("admin/dashboard") && linkHref.includes("admin/dashboard")) ||
                (currentUrl.includes("produk") && linkHref.includes("produk")) ||
                (currentUrl.includes("slider") && linkHref.includes("slider")) ||
                (currentUrl.includes("aktivitas") && linkHref.includes("aktivitas")) ||
                (currentUrl.includes("profil") && linkHref.includes("profil"))
            ) {
                link.classList.add("active");
            }
        });
    </script>
</body>

</html>