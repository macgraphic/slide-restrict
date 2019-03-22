<?php
/**
 * The template that supplies our Pharma Notice on the home page.
 */
?>

<script>
	jQuery(document).ready( function($) {
		$('#pharman').click(function() {
		$('li.orbit-slide.restricted').addClass('pharmano');
		});
	});
</script>

<div id="home-pharma-callout" class="home-pharma callout" data-closable="slide-out-up">
	<h5>Quick Question...</h5>
	<p>In order to best provide you with the best experience on our site, please answer the following question...</p>
	<p><strong>Do you work in the NHS?</strong></p>
	<div class="large button-group align-center">
		<button id="pharmay" class="button" aria-label="Close" type="button" data-close>Yes</button>
		<button id="pharman" class="button" aria-label="Close" type="button" data-close>No</button>
	</div>
</div>
