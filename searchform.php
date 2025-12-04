<?php
/**
 * searchform.php
 * @package WordPress
 * @subpackage Fynode
 * @since Fynode 1.0
 * 
 */
 ?>

<form class="search-form">
	<input type="search" class="form-control search-input no-style" name="s" placeholder="<?php esc_attr_e('Search everything...', 'fynode') ?>" autocomplete="off">
	<button type="submit" class="btn no-style"><i class="klb-icon-search"></i></button>
</form>