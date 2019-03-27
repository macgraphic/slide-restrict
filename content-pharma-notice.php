<?php
/**
 * The template that supplies our Pharma Notice on the home page.
 */
?>


<script>
	jQuery(document).ready( function($) {
		$('#pharman').click(function() {
		$('.restricted').remove();
		});
	});
</script>

<div id="home-pharma-callout" class="home-pharma callout" data-closable="slide-out-up">
	<h5>Quick Question...</h5>
	<p>In order to provide you with the best experience on our site, please answer the following question...</p>
	<h6><strong>Are you a healthcare professional?</strong></h6>
	<div class="large button-group align-center">
		<button type="submit" id="pharmay" class="button" aria-label="Close" type="button" data-close>Yes</button>
		<button type="submit" id="pharman" class="button" aria-label="Close" type="button" data-close>No</button>
	</div>
</div>

