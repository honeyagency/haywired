<?php
/**
 * Template for displaying search forms
 *
 * @package WordPress
 * @subpackage Buscemi
 * @version 1.0
 */
$searchPlaceholder = get_field('field_5a87361041aba', 'options');
$searchButton      = get_field('field_5a87361e41abb', 'options');
$searchPrompt      = get_field('field_5a87362441abc', 'options');

?>

<?php $unique_id = esc_attr(uniqid('search-form-'));?>

<form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/')); ?>">
	<a href="" class="trigger--search"><span>+</span></a>
	<h2 class="color--green text--uppercase font--condense"><?php echo $searchPrompt; ?></h2><br>
	<div class="fields">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo $searchPlaceholder; ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo $searchPlaceholder; ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit screen-reader-text-mob"><?php echo $searchButton; ?></button>
</div>
</form>
