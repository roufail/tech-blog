<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>{{ config('app.name') }} - @yield('page_title','Home Page')</title>
    <meta name="keywords" content="@yield('page_keywords','tech,blog')">
    <meta name="description" content="@yield('page_description','this is tech blog')">
    <meta name="author" content="@yield('page_author',config('app.name'))">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('frontend/img/apple-touch-icon.png') }}">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/css/bootstrap.css')  }}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{ asset('frontend/css/font-awesome.min.css')  }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend/css/style.css')  }}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{ asset('frontend/css/responsive.css')  }}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{ asset('frontend/css/responsive.css')  }}" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="{{ asset('frontend/css/tech.css')  }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('css-stack')

</head>
