@extends('layouts.user.app')
@section('user_content')

@section('page_title', 'List Of Blog')


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
        </ol>
        <h2>{{ $blog->name }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <h2 class="entry-title">
                <a href="blog-single.html">{{ $blog->name }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">Moniruzzaman</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ $blog->created_at->diffForhumans() }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                 {{ $blog->short_description }}
                </p>

                <p>
                  {{ $blog->description }}
                </p>
              </div>
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="{{ url('blog-search') }}" method="POST">
                    @csrf
                  <input type="text" placeholder="Blog Search" name="search_key">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->


              <h3 class="sidebar-title">Recent Posts</h3>
              @foreach ($recent_blogs as $item)
                <div class="sidebar-item recent-posts">
                    <div class="post-item clearfix">
                    <h4><a href="blog-single.html">{{ $item->name }}</a></h4>
                    <time datetime="2020-01-01">{{ $item->created_at->diffForhumans() }}</time>
                    </div>
                </div><!-- End sidebar recent posts-->
              @endforeach

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

@endsection
