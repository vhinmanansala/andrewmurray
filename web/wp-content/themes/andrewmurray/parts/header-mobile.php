<div class="mobile">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="<?php bloginfo( 'url' ); ?>" class="header__logo">
					<?php
					if ( has_custom_logo() ) {
						echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
					} else {
						bloginfo( 'name' );
					}
					?>
				</a>

				<span class="menu-icon"></span>
			</div>
		</div>
	</div>

	<div id="mobile-menu-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?php bloginfo( 'url' ); ?>" class="header__logo">
						<?php
						if ( has_custom_logo() ) {
							echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
						} else {
							bloginfo( 'name' );
						}
						?>
					</a>

					<span class="close-menu"></span>

					<div id="mobile-search-container">
						<?php get_search_form(); ?>
					</div>


					<?php wp_nav_menu(['theme_location' => 'main', 'container' => false]); ?>
				</div>
			</div>
		</div>
	</div>
</div>