
<!DOCTYPE html>
<html lang="en">
      {{--header--}}
      @include('siakad/template/header')
      <body id="page-top">
    {{--navbar--}}
    @include('siakad/template/navbar')

        <div class="container">
            @yield('content')
        </div>

    {{--javascript--}}
    @include('siakad/template/javascript')

    </body>
</html>
