<?php
/**
 * Template for displaying search forms
 *
 * @package ClubBlog
 */

?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-wrap">
		<div class="row">
			<div class="col-12 col-lg-7 col-xl-8">
				<input type="search" class="form-control" placeholder="<?php echo esc_attr__( 'Search', 'clubblog' ); ?>..." name="s" id="search-input" value="<?php echo get_search_query(); ?>" />
			</div>
			<div class="col-12 col-lg-5 col-xl-4">
				<input class="btn btn-default btn-block btn-search" type="submit" id="search-submit" value="<?php echo esc_attr__( 'Search', 'clubblog' ); ?>" />
			</div>
		</div>
	</div>
</form>
