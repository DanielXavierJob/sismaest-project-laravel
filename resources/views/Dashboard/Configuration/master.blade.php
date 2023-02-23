<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="{{$description}}">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('./main.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.scrollTo.js')}}"></script>

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @yield('header-app')
        @yield('Settings')
        <div class="loader" style="position: fixed;    z-index: 9999;    top: 45%;    left: 50%;">
            <div class="ball-clip-rotate">
                <div style="background-color: rgb(68, 64, 84); "></div>
            </div>
        </div>
        <div class="app-main">
            @yield('sidebar')
            <div class="app-main__outer" style="filter: blur(5px);">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="{{$icon}}">
                                    </i>
                                </div>
                                <div>{{$title_page}}
                                    <div class="page-title-subheading">{{$description_page}}
                                    </div>
                                </div>
                            </div>
                            @if($button_return)
                            <div class="page-title-actions">
                                <a href=" {{ URL::previous() }}" type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Retornar a página anterior">
                                    <i class="pe-7s-back-2"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>






                    @yield('content')
                </div>
                @yield('Footer')
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>

    <script>
        $(window).on('load', function() {
            // Animate loader off screen

            $(".loader").hide();
            $(".app-main__outer").css('filter', 'blur(0px)');

        });
    </script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
</body>

</html>