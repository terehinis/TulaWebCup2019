<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css" />
        <title>Terekhin - TulaWebCup19</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">TulaWebCap2019</h5>
            @if (Route::has('login'))
                @auth
                    <a class="btn btn-outline-primary" href="{{ route('logout') }}">{{Auth::authenticate()->name}} Выйти</a>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>
                @endauth
            @endif

        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div style="display: {!! intval($total) == 1 ? 'none' : 'block'!!}; margin-right: 20px;">
                    Страница:
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @for($i = $page-3; $i < $page; $i++) @if($i <= 0) @continue @endif
                                <li class="page-item {!! intval($page) == intval($i) ? 'active' : '' !!}"  ><a class="page-link" href="/?limit={{ $limit }}&page={{ $i }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item active"  ><a class="page-link" href="#">{{ $page }}</a></li>
                            @for($i = $page+1; $i <= $total && $i <= $page+3; $i++)
                                <li class="page-item {!! intval($page) == intval($i) ? 'active' : '' !!}"  ><a class="page-link" href="/?limit={{ $limit }}&page={{ $i }}">{{ $i }}</a></li>
                            @endfor
                        </ul>
                    </nav>
                </div>

                <div>
                    На странице:
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {!! intval($limit) == 10 ? 'active' : '' !!}"  ><a class="page-link" href="/?limit=10&page=1">10</a></li>
                            <li class="page-item {!! intval($limit) == 20 ? 'active' : '' !!}"  ><a class="page-link" href="/?limit=20&page=1">20</a></li>
                            <li class="page-item {!! intval($limit) == 50 ? 'active' : '' !!}"  ><a class="page-link" href="/?limit=50&page=1">50</a></li>
                            <li class="page-item {!! $limit == 'all' ? 'active' : '' !!}"  ><a class="page-link" href="/?limit=all&page=1">Все</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="lightgallery" class="row justify-content-center">
                @foreach ($photos as $photo)
                    <a href="{{ $photo->file }}">
                        <img style="width: 200px; height: 200px;" class="card md-4 box-shadow center-block" src="{!! $photo->file !!}" />
                    </a>
                @endforeach
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <span class="text-muted"><a href="https://github.com/terehinis/TulaWebCup2019">TulaWebCup2019</a></span>
            </div>
        </footer>

    <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
    <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
    </body>
</html>
