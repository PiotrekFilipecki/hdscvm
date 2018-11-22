{{--
  Template Name: Home Template
--}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <!-- @include('partials.content-page') -->

  <div class="recent-wrapper">
  <ul class="works-list">
  <?php
  $posts = get_posts( array( 'numberposts' => 9 ) );
  foreach ( $posts as $_post ) {
      if ( has_post_thumbnail( $_post->ID ) ) {
          echo '<li class="video"><h2>' . $_post->post_title . '</h2>';
          echo '<a class="modal-link" href="' . get_permalink( $_post->ID ) . '" title="' . esc_attr( $_post->post_title ) .'">';

          echo get_the_post_thumbnail( $_post->ID, 'large', 'style=max-width:100%;height:auto;' );
          echo '</a></li>';
      }
  }
  ?>
  </ul>
  <a href="./works">See more</a>
</div>
  @endwhile
@endsection

