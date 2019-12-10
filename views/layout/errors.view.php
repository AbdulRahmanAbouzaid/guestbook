<ul>
    <?php 
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error) {
    ?>
            <li style="color:red"><?= $error ?></li>
    <?php 
        }
        unset($_SESSION['errors']);
    }
    ?> 
</ul>