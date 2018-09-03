<?php
/**
 * News Widget.
 */

$news_page = get_query_var( 'news_page' );
$news_posts = bace_get_news_posts( $news_page );

if ( empty( $news_posts ) ) {
	return;
}

$featured_news_post = array_shift( $news_posts );
?>

<div class="news-slide-container" >
	<article class="bace-most-recent-news">
		<?php if ( has_post_thumbnail( $featured_news_post ) ) { ?>

			<figure class="bace-most-recent-news__thumbnail">
				<a href="<?php echo esc_url( get_permalink( $featured_news_post->ID ) ); ?>" >
					<?php echo get_the_post_thumbnail( $featured_news_post, 'post-thumbnail' ); ?>
				</a>
			</figure>

		<?php } ?>

		<div class="bace-most-recent-news__content">
			<h3 class="bace-most-recent-news__title">
				<a href="<?php echo esc_url( get_permalink( $featured_news_post->ID ) ); ?>">
					<?php echo esc_html( get_the_title( $featured_news_post->ID ) ); ?>
				</a>
			</h3>
			<time class="bace-most-recent-news__date"><?php echo esc_html( get_the_date( false, $featured_news_post->ID ) ); ?></time>
		</div>
	</article>

	<div class="bace-recent-news__container">
		<ul class="bace-recent-news__list">
			<?php if ( ! empty( $news_posts ) ) {
				foreach ( $news_posts as $news_post ) { ?>
					<li>
						<a href="<?php echo esc_url( get_permalink( $news_post ) ); ?>">
							<?php echo esc_html( get_the_title( $news_post ) ); ?>
						</a>
					</li>
			<?php }
			}  ?>
		</ul>
	</div>
</div>
