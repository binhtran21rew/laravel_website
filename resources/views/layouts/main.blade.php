<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
        @yield('title')

        <!-- Favicon -->
        <link href="{{ asset('eshopper/img/favicon.ico')}}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <!-- Libraries Stylesheet -->
        <link href="{{ asset('eshopper/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        @yield('css')
    </head>

    <body>
        @include('component.header')

        @yield('content')  
        
        @include('component.footer')
       <!-- JavaScript Libraries -->
       <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('eshopper/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('eshopper/lib/owlcarousel/owl.carousel.min.js')}}"></script>

        <!-- Contact Javascript File -->
        <script src="{{ asset('eshopper/mail/jqBootstrapValidation.min.js')}}"></script>
        <script src="{{ asset('eshopper/mail/contact.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('eshopper/js/main.js')}}"></script>
        @yield('js')
    </body>
</html>