<?php
/**
 * News Widget.
 */

$news_posts_ids = bace_get_news_posts();

if ( empty( $news_posts_ids ) ) {
	return;
}

foreach ( $news_posts_ids as $post_ids ) {
?>

<div class="news-slide-container" >

	<?php foreach ( $post_ids as $key => $post_id ) { ?>

		<?php if ( $key === 0 ) { ?>

	<article class="bace-most-recent-news">
		<?php if ( has_post_thumbnail( $post_id ) ) { ?>

			<figure class="bace-most-recent-news__thumbnail">
				<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" >
					<?php echo get_the_post_thumbnail( $post_id, 'post-thumbnail' ); ?>
				</a>
			</figure>

		<?php } ?>

		<div class="bace-most-recent-news__content">
			<h3 class="bace-most-recent-news__title">
				<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
					<?php echo esc_html( get_the_title( $post_id ) ); ?>
				</a>
			</h3>
			<time class="bace-most-recent-news__date"><?php echo esc_html( get_the_date( false, $post_id ) ); ?></time>
		</div>
	</article>
	<?php } else { ?>

	<div class="bace-recent-news__container">
		<ul class="bace-recent-news__list">
			<li>
				<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
					<?php echo esc_html( get_the_title( $post_id ) ); ?>
				</a>
			</li>
		</ul>
	</div>
	<?php } ?>
	<?php } ?>

</div>
<?php } ?>
