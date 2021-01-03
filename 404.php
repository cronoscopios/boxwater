<?php get_header(); ?>

<div class="container-404">
    <h2 class="page-heading">Oh! What?? 404?</h2>
    <img src="http://source.unsplash.com/648x480/?dogs" />
    <h3>Sorry find, I think you're lost. Plz try the follin links.</h3>
    <ul>
        <li><a href="<?php echo site_url( '/blog' ); ?>">Blog List</a></li>
        <li><a href="<?php echo site_url( '/projects' ); ?>">Projects List</a></li>
        <li><a href="<?php echo site_url( '/about' ); ?>">About Me</a></li>
        <li><a href="<?php echo site_url(); ?>">Home page</a></li>
    </ul>
</div>

<?php get_footer(); ?>