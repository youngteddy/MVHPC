</div>
<div id="footer">
    <?php
    if ($Auth->loggedIn()) {
        ?>
        <p><a href="login.php">Manage site</a><br>
            <?php if (isset($id)) { ?>
                <a href="edit.php?id=<?php echo $id; ?>">Edit this Page</a></p>
            <?php
        }
    } else {
        ?>
        <p>Contact:  <a href="email_form.php?to=lkorth12&domain=cornellcollege.edu">Webmaster</a> &nbsp; &#124; &nbsp;
            Designed and Developed: <a href="email_form.php?to=lkorth12&domain=cornellcollege.edu">LARS</a> &nbsp; &#124; &nbsp;
            <a href="login.php">Login</a> to manage site
            <?php
            if (isset($zoom) && $zoom == 1) {
                echo "&nbsp; &#124; &nbsp; Zoom:  <a href=\"http://www.magictoolbox.com\">Magic Toolbox</a></p>";
            } else {
                echo "</p>";
            }
        }
        ?>
</div>
</div>
<br>
</body>
</html>