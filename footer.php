<div class="copy-right">
    <div class="container">
        <div class="row">
            <p class="copy-right-grids text-md-left text-center my-sm-4 my-4 col-md-6">© <?php echo date("Y"); ?> box water. all rights reserved.
            </p>
            <div class="w3pvt-footer text-md-right text-center m-4 col-md-5">
                <ul class="list-unstyled w3pvt-icons">
                    <!-- <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li> -->

                <?php 
                    if(get_option ( "rs_show" ) == "si" ){

                    if(get_option ( "rs_linkedin" ))
                    echo "<li><a href='".get_option( "rs_linkedin" )."' target='_blank'><span class='fa fa-linkedin'></span></a></li>";

                    if(get_option( "rs_instagram" ))
                    echo "<li><a href='".get_option( "rs_instagram" )."' target='_blank'><span class='fa fa-instagram'></span></a></li>";

                    //if(get_option( "rs_google" ))
                    //echo "<li><a href='".get_option( "rs_google" )."' target='_blank'><span class='fab fa-github'></span></a></li>";
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</main>

<?php wp_footer(); ?>

</body>
</html>