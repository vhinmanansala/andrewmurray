<?php

	global $post;

	$className = 'featured-content';

	if (! empty($block['className'])) {
		$className .= ' ' . $block['className'];
	}

	if (! empty($block['align'])) {
		$className .= ' has-text-align-' . $block['align'];
	}

	$title = get_field('title');
	$contents = get_field('contents');
?>

<div class="<?php echo esc_attr($className); ?>">
	<div class="row">
		<div class="title-section-container col-md-12">
			<?php if ($title) : ?>
				<h3><?php echo $title; ?></h3>
			<?php endif; ?>

			<?php if ($contents) : ?>
				<div class="row">
					<?php foreach ($contents as $content) : ?>
						<div class="col-md-4">
							<div class="featured-content">

								<?php echo $content->post_title; ?>

								<div class="wp-block-button purple-filled-button">
									<a href="<?php echo get_the_permalink($content->ID); ?>" class="wp-block-button__link">
										Find out more
									</a>
								</div>
								
								<img src="<?php echo get_the_post_thumbnail_url($content->ID) ?>" class="thumbnail">
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		
	</div>
</div>