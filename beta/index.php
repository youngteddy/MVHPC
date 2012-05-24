<!doctype html>

<?php

error_reporting('E_ALL');

include('../includes/master.inc.php');
include('../includes/class.template.php');

$template = new Template();

$posts = returnPosts('index', 1);

?>
<html>
<?php ob_start(); ?>
    <script src="js/jquery.tagcloud.min.js"></script>
<?php 
    $headerExtras = ob_get_clean();
    ob_start();
?>
    <div class="newsfeed">
        <h1 class="ribbon">Welcome!</h1>
        <div class="article">
            <p>
                Welcome to the exciting past and present of an unusual small 
                community in the heart of the Heartland!
            </p>
            <p>
                This site opens our historical resources to the Internet and 
                invites you to share in adding information, correcting our 
                sources, and asking us for specific information you cannot find 
                here. This site is an organic history book &mdash; it continues to grow 
                from the input and knowledge of anyone in the world. Almost all 
                of our known historical resources will eventually be available 
                on this website.
            </p>
            <p>
                Mount Vernon Historic Preservation Commission :: Mount Vernon, Iowa
            </p>
        </div>
        <?php foreach($posts as $post): ?>
        <h1 class="ribbon"><?php echo $post['title']; ?></h1>
        <div class="article">
            <p>
                <?php echo max_words($post['text'], 150); ?>
            </p>
            <a href="<?php WEBROOT() ?>pages/posts.php?id=<?php echo $post['id']; ?>">Read more...</a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="left_box">
        <div>
            <h1 class="ribbon">Featured Images</h1>
            <div class="left_content">
                <?php $imgArr = featuredImages();
                        $cnt = 0;
                        foreach($imgArr as $img): ?>
                        <?php if($cnt == 0): ?>
                            <div class="featured current">
                        <?php else: ?>
                                <div class="featured">
                        <?php endif; ?>
                        <a href="<?php WEBROOT(); ?>pages/fullsize.php?id=<?php echo $img['id']; ?>"><img src="<?php echo WEB_ROOT . $img['thumbnail']; ?>" /></a>
                    </div>
                <?php
                    $cnt++;
                endforeach; ?>
                </div>
                <span style="display:block; margin:0 auto; color: #FF6600;"><button id="prevImg"><</button><button id="nextImg">></button></span>
            </div>
            <div>
                <h1 class="ribbon">Common Tags</h1>
                <div class="left_content" id="tagcloud">

                </div>
            </div>
        </div>
    </div>
<?php
    $content = ob_get_clean();

    $template->setStyle('twoColumn');
    $template->setTitle('Mount Vernon Historial Preservation Commission');
    $template->setHeaderExtras($headerExtras);
    $template->setBody($content);

    $template->output();
?>