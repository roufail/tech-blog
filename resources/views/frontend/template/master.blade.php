<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('frontend.template.partials.head')

<body>
    @include('frontend.template.partials.header')
    @yield('template')
    @include('frontend.template.partials.footer')
    @include('frontend.template.partials.foot')
</body>

</html>
