<?php
/**
 * Page Template.
 *
 * @package boylen-plus
 */

get_header();
?>

	<main class="main">
		<?php
		the_post();
		the_content();
		?>

	</main> <!-- .main -->

<?php
get_footer();
