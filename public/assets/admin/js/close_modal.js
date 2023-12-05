function close_modal(params) {
    var close = document.querySelector('.'+params);
    if(close.classList.contains('swal-overlay--show-modal')){
        close.classList.remove('swal-overlay--show-modal');
    }else if(!close.classList.contains('modal fade')){
        close.style.display = 'none';
    }
}
