{{--
  Template Name: Work Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
<div class="works">
<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
) );

foreach ( $categories as $category ) {
    printf( '<a href="%1$s">%2$s</a><br />',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
}
?>

<ul class="categories-filters">
 <?php $args = array(
     'show_option_all' => 'All',
     'title_li' => __('')
 );

 wp_list_categories( $args ); ?>
 </ul>
</div>

<?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
        );

        $query = new WP_Query( $args );

        $tax = 'category';
        $terms = get_terms( $tax );
        $count = count( $terms );

        if ( $count > 0 ): ?>
            <div class="post-tags">
            <?php
            foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, $tax );
                echo '<a href="' . $term_link . '" class="tax-filter" title="' . $term->slug . '">' . $term->name . '</a> ';
            } ?>
            </div>
        <?php endif;
        if ( $query->have_posts() ): ?>
        <div class="tagged-posts">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
            <div class="tagged-posts">
                <h2>No posts found</h2>
            </div>
        <?php endif; ?>
</div>
  @endwhile
@endsection


