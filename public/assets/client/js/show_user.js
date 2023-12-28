var userCustom = document.getElementById('userCustom');
    if(userCustom){
        var user_form = document.querySelector('.user_form');
        userCustom.addEventListener('click',function(){
            if(user_form.classList.contains('show')){
                user_form.classList.remove('show');
            }else{
                user_form.classList.add('show');
            }
        })
    }