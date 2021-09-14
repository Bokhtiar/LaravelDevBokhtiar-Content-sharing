@extends('layouts.user.app')
@section('user_content')

@section('page_title', 'List Of Blog')

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">
            @foreach ($blogs as $item)
            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry">
                  <h2 class="entry-title">
                    <a href="blog-single.html">{{ $item->name }}</a>
                  </h2>

                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Moniruzzaman</a></li>
                      <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ $item->created_at->diffForhumans() }}</time></a></li>
                    </ul>
                  </div>

                  <div class="entry-content">
                    <p>
                     {{ $item->short_description }}.
                    </p>
                    <div class="read-more">
                      <a href="{{ url('blog/detail/'.$item->name) }}">Read More</a>
                    </div>
                  </div>

                </article><!-- End blog entry -->
              </div>
            @endforeach
        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  @endsection
