<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Inventario</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <span id="logoText" class="navbar-brand mb-0 h1">
        <img width="30" height="30" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojMTdBQ0U4OyIgZD0iTTM1MS4zMDEsMzUxLjM5OUwyMzAuNCw0NzIuM2MtNTIuNSw1Mi44LTEzOC4zLDUyLjgtMTkwLjgsMGMtNTIuOC01Mi41LTUyLjgtMTM4LjMsMC0xOTAuOCAgbDEyMC44OTktMTIwLjkwMWw1Ni4xLTMuOUwzMjguMiwyNjguM0wzNTEuMzAxLDM1MS4zOTl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiMxNjg5RkM7IiBkPSJNMzUxLjMwMSwzNTEuMzk5TDIzMC40LDQ3Mi4zYy01Mi41LDUyLjgtMTM4LjMsNTIuOC0xOTAuOCwwbDI0Ni4yOTktMjQ2LjMwMUwzMjguMiwyNjguMyAgTDM1MS4zMDEsMzUxLjM5OXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0U1RTVFNTsiIGQ9Ik00NzIuMiwyMzAuNUwzNTEuMzAxLDM1MS4zOTlsLTk1LjQwMi05NS40bC05NS40LTk1LjRMMjgxLjQsMzkuN2M1Mi41LTUyLjgsMTM4LjMtNTIuOCwxOTAuOCwwICBDNTI1LDkyLjIsNTI1LDE3OCw0NzIuMiwyMzAuNXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0Q5RDlEOTsiIGQ9Ik00NzIuMiwyMzAuNUwzNTEuMzAxLDM1MS4zOTlsLTk1LjQwMi05NS40TDQ3Mi4yLDM5LjdDNTI1LDkyLjIsNTI1LDE3OCw0NzIuMiwyMzAuNXoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0ZDQkYyOTsiIGQ9Ik01MTIsMzc2LjljMCw3NC4zOTktNjAuNjAxLDEzNS0xMzUsMTM1bC0zMC0yNS42NjhWMjczLjE1bDMwLTMxLjI1ICBDNDUxLjM5OSwyNDEuOSw1MTIsMzAyLjQ5OSw1MTIsMzc2Ljl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRURCNDE7IiBkPSJNMzc3LDI0MS45Yy03NC4zOTksMC0xMzUsNjAuNTk5LTEzNSwxMzVjMCw3NC4zOTksNjAuNjAxLDEzNSwxMzUsMTM1VjI0MS45eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
        <a href="{{ route('productos.index')}}">MEDICAL</a>
      </span>
    </nav>
    <div class="container">
      @yield('title')
    </div>
    <div class="container bg-container">
      @include('flash::message')
      @yield('main')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('/js/productos.js') }}" ></script>

  </body>
</html>
