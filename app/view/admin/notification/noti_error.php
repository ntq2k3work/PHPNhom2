<div class="swal-overlay swal-overlay--show-modal reInput" onclick="close_modal('reInput')">
    <div class="swal-modal" role="dialog" aria-modal="true">
        <div class="swal-icon swal-icon--error">
            <div class="swal-icon--error__x-mark">
                <span class="swal-icon--error__line swal-icon--error__line--left"></span>
                <span class="swal-icon--error__line swal-icon--error__line--right"></span>
            </div>
        </div>
        <div class="swal-text" style="">
            <?php 
                if(isset($_SESSION['ERROR'])){
                    echo $_SESSION['ERROR'];
                }  
            ?>
        </div>
        <div class="swal-footer">
            <div class="swal-button-container">

                <button class="swal-button swal-button--confirm " onclick="close_modal('reInput')" >Thoát</button>

                <div class="swal-button__loader">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </div>
        </div>
    </div>
</div>