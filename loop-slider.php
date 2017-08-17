<?php
$args = array(
                        'sort_order' => 'ASC',
                        'sort_column' => 'post_title',
                        'hierarchical' => 1,
                        'child_of' => 0,
                        'offset' => 0,
                        'post_type' => 'based_slider',
                        'post_status' => 'publish'
                    );
                    $data= get_pages($args);

                    $recent_posts = wp_get_recent_posts($args);

                    foreach ( $recent_posts as $recent ) {
                        $feat_image = wp_get_attachment_url ( get_post_thumbnail_id ( $recent ["ID"] ) );
                        if(empty($feat_image)) {
                            $feat_image= get_post_content_img($recent ["post_content"]);
                        }
                        if($postid!=6){
                            if(!empty($feat_image)){
                                $postid ++;
                                $excerpt = $recent ["post_excerpt"];
                                if(empty($excerpt)){
                                    $excerpt = wp_strip_all_tags($recent ["post_content"]);
                                }
                                echo ' <div class="slider-show" style=" width: 95% ;    background-size: 100% 100%;    height: 280px;background-image:url(' . $feat_image . ');"><div class="slider-data slider-data' . $postid .'" data-img="' . $feat_image . '" >                    <p class="post-title">' . $recent ["post_title"] . '</p>                    <p class="post-description">' . $excerpt  . '</p>                </div></div>';
                            }
                        }
                    }