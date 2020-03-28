<div class="desktop">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="<?php bloginfo( 'url' ); ?>" class="header__logo">
					<?php
					if ( has_custom_logo() ) {
						echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
					} else {
						bloginfo( 'name' );
					}
					?>
				</a>
			</div>

			<div id="menu-container" class="col-md-8">
				<?php wp_nav_menu(['theme_location' => 'main', 'walker' => new WPSE_78121_Sublevel_Walker, 'container' => false]); ?>
				<span class="search-icon"></span>
			</div>
		</div>
		</div> <!-- .wrap -->

		<div id="search-modal-container">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span class="close-search"></span>

						<div id="search-container">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>