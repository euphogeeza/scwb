<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}" />
    <title>@yield('title', 'Snowdown Colliery Welfare Band - Admin Panel')</title>
</head>
<body>
    <div class="row g-0">
        <!-- SIDEBAR -->
        <div class="p-3 col fixed test-white bg-dark">
            <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                <span class="fs-4">Admin Panel</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li>
                    <a href="{{ route('admin.home.index') }}" class="nav-link text-white">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.composer.index') }}" class="nav-link text-white">
                        Composers / Arrangers
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.style.index') }}" class="nav-link text-white">
                        Musical Styles
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.music.index') }}" class="nav-link text-white">
                        Music
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">
                        Go back to the homepage
                    </a>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR -->

        <!-- CONTENT -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <img class="img-profile rounded-circle" src="{{ asset('/images/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5">
                @yield('content')
            </div>
        </div>
        <!-- END CONTENT -->
    </div>

    <!-- FOOTER -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright - Snowdown Colliery Welfare Band
            </small>
        </div>
    </div>
    <!-- END FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>
</html>