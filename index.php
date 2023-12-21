<?php 
    get_header();

    the_content();

    if(is_user_logged_in()){
        get_footer();
    }else{
        get_footer('lock');
    }
        
    
    
?>	