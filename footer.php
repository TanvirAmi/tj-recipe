<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TJ_Recipe
 */

?>

<!-- ****** Footer Social Icon Area Start ****** -->
<?php tj_recipe_footer_social(); ?>
<!-- ****** Footer Social Icon Area End ****** -->

<!-- ****** Footer Menu Area Start ****** -->
<footer class="footer_area">

<?php footer_menu(); ?>

<?php footer_copyright(); ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>
