@include('aplikasi.head')
@include('aplikasi.header')
@include('aplikasi.sidebar')
<section id="main-content">
          <section class="wrapper"> 
          	@yield('content')
          </section>
</section>
@include('aplikasi.footer')
