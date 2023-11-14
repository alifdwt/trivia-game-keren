<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('includes.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="content">
                @include('includes.topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
    @include('includes.scrolltop')
    @include('includes.logoutmodal')
    @include('includes.scripts')
</body>
</html>