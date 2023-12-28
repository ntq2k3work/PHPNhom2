<div class="swal-overlay swal-overlay--show-modal reInput">
    <div class="swal-modal" role="dialog" aria-modal="true" style="overflow: hidden;">
        <div class="swal-icon--success">
            <div class="swal-icon swal-icon--success__ring ">
                <span class="swal-icon--success__line swal-icon--success__line--tip"></span>
                <span class="swal-icon--success__line swal-icon--success__line--long"></span>
            </div>
        </div>
        <div class="swal-text" style="">
            <?php
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
            }
            ?>
        </div>
        <div class="swal-footer">
            <div class="swal-button-container">

                <button class="swal-button swal-button--confirm " onclick="close_modal('reInput')">Thoát</button>

                <div class="swal-button__loader">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
  function close_modal(params) {
    var close = document.querySelector('.'+params);
    if(close.classList.contains('swal-overlay--show-modal')){
        close.classList.remove('swal-overlay--show-modal');
    }else if(!close.classList.contains('modal fade')){
        close.style.display = 'none';
    }
}

</script>