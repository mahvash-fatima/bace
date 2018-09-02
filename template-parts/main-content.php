<section class="bace-main container">
	<div class="row">
		<div class="bace-content col-md-8">
			<div class="bace-content__category-container row">
				<h2 class="bace-title">Glimpses of Exhibition</h2>
				<?php get_template_part( 'template-parts/category-content' ); ?>
			</div>
			<div class="bace-content__social row">
				<div class="bace-content__twitter col-md-5">
					<h2 class="bace-title">Latest Tweets</h2>
					<!-- https://developer.twitter.com/en/docs/twitter-for-websites/overview-->
					<a class="twitter-timeline" data-height="200" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
				<!-- https://developers.facebook.com/docs/plugins/page-plugin/-->
				<div class="bace-content__facebook fb-page col-md-7" data-href="https://www.facebook.com/babul.ilm.786/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
					<h2 class="bace-title">Follow us on Facebook</h2>
					<blockquote cite="https://www.facebook.com/babul.ilm.786/" class="fb-xfbml-parse-ignore">
						<a href="https://www.facebook.com/babul.ilm.786/">Babul ilm</a>
					</blockquote>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
