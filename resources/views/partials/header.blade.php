<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="@asset('images/hdscvm.jpg')" alt="HDSCVM">
    </a>
    <?php
    // $custom_logo_id = get_theme_mod( 'custom_logo' );
    // $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    // if ( has_custom_logo() ) {
    //         echo '<img src="'. esc_url( $logo[0] ) .'">';
    // } else {
    //         echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
    // }
    // ?>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
