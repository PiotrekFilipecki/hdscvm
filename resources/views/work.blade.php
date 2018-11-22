{{--
  Template Name: Work Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
<div class="works">
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">


  	<?php
		if( $terms = get_terms( 'category', 'orderby=name' ) ) : // to make it simple I use default categories
			echo '<select class="category" name="categoryfilter">';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
    ?>


	<!-- <button>Apply filter</button> -->
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response">
    <!-- <ul class="works-list">

    </ul> -->
</div>
</div>





  @endwhile
@endsection


