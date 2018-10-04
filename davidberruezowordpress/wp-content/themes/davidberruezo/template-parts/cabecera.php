<body>

<header class="header">

    <div class="top-bar container-fluid">
        <div class="actions">
            <a class="btn hidden-xs" href="mailto:davidberruezo@davidberruezo.com"><i class="fa fa-paper-plane" aria-hidden="true"></i> Hire Me</a>
            <a class="btn" href="curriculum.docx"><i class="fa fa-download" aria-hidden="true"></i> Download My Resume</a>
        </div><!--//actions-->
        <ul class="social list-inline">
            <li><a href="https://www.linkedin.com/in/berruezodavid/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <!--
            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-github-alt" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
            -->
        </ul><!--//social-->
    </div><!--//top-bar-->

    <div class="intro">
        <div class="container text-center">
            <?php
            // Servidor
            //$url = "http://www.davidberruezo.com/wp-content/themes/davidberruezo/images/profile-image2.png";
            // Local
            $url = "http://www.davidberruezowordpress.net/wp-content/themes/davidberruezo/images/profile-image2.png";
            ?>
            <img class="profile-image" src="<?php echo $url; ?>" alt="">
            <?php $args = array(
                'posts_per_page'   => -1,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'date',
                'order'            => 'ASC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	   => '',
                'author_name'	   => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $posts_array = get_posts( $args );
            foreach($posts_array as $post){
                if ($post->post_title == "nombre"){ ?>
                    <h1 class="name"><?php echo $post->post_content; ?></h1>
                <?php }else if($post->post_title == "shortdescripcion"){ ?>
                    <div class="title"><?php echo $post->post_content; ?></div>
                <?php }else if($post->post_title == "descripcion"){ ?>
                    <div class="profile"><p><?php echo $post->post_content; ?></p></div>
                <?php } ?>
            <?php
            }
            ?>
            <!--//profile-->
        </div><!--//container-->
    </div><!--//intro-->

    <div class="contact-info">
        <div class="container text-center">
            <ul class="list-inline">
                <li class="email"><i class="fa fa-envelope"></i><a href="mailto:davidberruezo@davidberruezo.com">davidberruezo@davidberruezo.com</a></li>
                <li><i class="fa fa-phone"></i> <a href="tel: +34 615 23 15 33">+34 615 23 15 33</a></li>
                <li class="website"><i class="fa fa-globe"></i><a href="#" target="_blank">davidberruezo.com</a></li>
            </ul>
        </div><!--//container-->
    </div><!--//contact-info-->

    <div class="page-nav-space-holder hidden-xs">
        <div id="page-nav-wrapper" class="page-nav-wrapper text-center">
            <div class="container">
                <?php
                /*
                * Enlazamos menu principal
                */
                wp_nav_menu(
                    array(
                    'theme_location'  => 'primary',
                    'container'       => 'ul',
                    'container_class' => 'container',
                    'container_id'    => 'container',
                    'menu_class'      => 'nav page-nav list-inline',
                    'fallback_cb'     => 'photolab_page_menu'
                    )
                );
                ?>
                <!--//page-nav-->
            </div>
        </div><!--//page-nav-wrapper-->
    </div>

</header><!--//header-->
