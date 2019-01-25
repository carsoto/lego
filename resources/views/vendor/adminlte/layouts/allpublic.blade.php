<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader-public')
@show

<body>
    <div id="app">
        <div class="wrapper">

	        <!-- Main content -->
	        <section class="content">
	        	@yield('content')
	        </section><!-- /.content -->

        </div><!-- ./wrapper -->

        @include('adminlte::layouts.partials.footer-public')
    </div>
</body>

@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</html>


