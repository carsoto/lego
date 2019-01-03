<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader-public')
@show

<div id="app">
  
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->
        @yield('content')
    </section><!-- /.content -->

    <!-- @include('adminlte::layouts.partials.footer') -->

</div>

@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</html>