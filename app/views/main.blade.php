<!DOCTYPE html>
<html>

    <!-- This code is only meant for previewing your Reflow design. -->

    <head>
    <link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="css/boilerplate.css">
	<link rel="stylesheet" href="css/page.css">
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  </script>
    <script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </head>
    <body>

    <div id="primaryContainer" class="primaryContainer clearfix">
        <div id="skeleton" class="clearfix">
            <div id="header" class="clearfix">
                <p id="text">
                Sistema de Mailing
                </p>
                <img id="image" src="img/logo.png" class="image" />
            </div>
            <div id="content" class="clearfix">
            @yield('body')
            </div>
            <div id="footer" class="clearfix">
                <p id="text1">
                Todos los derechos reservados - Open Mind 2014
                </p>
            </div>
        </div>
    </div>
    </body>
</html>