<div class="swal-overlay swal-overlay--show-modal reInput" tabindex="-1">
  <div class="swal-modal" role="dialog" aria-modal="true">
    <div class="swal-icon swal-icon--warning">
      <div class="swal-icon--warning">
        <span class="swal-icon--warning swal-icon--warning__body"></span>
        <span class="swal-icon--warning swal-icon--warning__dot" style="bottom: 10px;"></span>
      </div>
    </div>
    <div class="swal-text" style=""><?php echo $_SESSION['warning'] ?></div>
    <div class="swal-footer">
      <div class="swal-button-container">
        <a class="swal-button swal-button--confirm mr-2" href="<?php echo $_SESSION['link'] ?><?php echo  $Item['id'] ?>">Xác nhận</a>
        <button class="swal-button swal-button--cancel " onclick="close_modal('reInput')">Huỷ bỏ</button>

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