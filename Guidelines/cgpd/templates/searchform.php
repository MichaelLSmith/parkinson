<?php namespace Fp\Fabric; ?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url() ); ?>">
	<label for="search-field" class="sr-only">Search</label>
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s"
			id="search-field">
		<span class="input-group-append">
			<button class="btn btn-light border" type="submit">
				<span class="fas fa-search" aria-hidden="true"></span>
				<span class="sr-only"> Search</span>
			</button>
		</span>
	</div>
</form>
