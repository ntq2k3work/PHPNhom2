<?php 
    $this -> render('layouts/cdn');
    
    $this -> render('layouts/header');
?>

<!-- Main -->
    <div id="root">
        <?php 
            if(!empty($mainContent)){
                $this -> render($mainContent,$this->data) ;
            }
        ?>
    </div>
<?php
    // Footer
    $this -> render('layouts/footer');
?>