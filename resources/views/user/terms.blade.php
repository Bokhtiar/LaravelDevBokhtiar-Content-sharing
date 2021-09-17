@extends('layouts.user.app')

@section('page_title', 'Terms of service')

@section('css')
@endsection

@section('user_content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/terms-of-serive') }}">Terms Of Service</a></li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="container">
        <div class="text-center">
            <h3>{{ $terms->title }}</h3> <br><br>
            {!! $terms->description !!}
        </div>
    </section>

</main>

@endsection


