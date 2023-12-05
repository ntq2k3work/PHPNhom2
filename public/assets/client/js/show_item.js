var ul_couple_clock = document.querySelector('.couple_clock');
var preItem = document.querySelector('.section_wapper_next_icon_left');
var nextItem = document.querySelector('.section_wapper_next_icon_right');
if(ul_couple_clock){
    var couple_item = ul_couple_clock.querySelectorAll('.item');
    var list_couple_length = couple_item.length; //Lấy số phần tử
}
console.log(list_couple_length);
var width_item = couple_item[0].offsetWidth;
let positionX_show_item = 0;
function move(value){
    if(value === 1){
        if(positionX_show_item === -width_item*(list_couple_length-4)){ //15xx
            positionX_show_item = width_item;
            ul_couple_clock.style =`transform:translateX(${positionX_show_item}px)`;
        }
        if(- positionX_show_item < width_item*(list_couple_length-4)) positionX_show_item -= width_item;
        ul_couple_clock.style =`transform:translateX(${positionX_show_item}px)`;
    }else{
        if(positionX_show_item === 0){
            positionX_show_item = -width_item;
            ul_couple_clock.style =`transform:translateX(${positionX_show_item}px)`;
            return;
        }
        if(- positionX_show_item < width_item*(list_couple_length-4)) positionX_show_item -= width_item;
        else{
            positionX_show_item = 0;
        }
        ul_couple_clock.style =`transform:translateX(${positionX_show_item}px)`;
    }
}

nextItem.addEventListener('click',function(){
    move(1);
}); //Đúng
preItem.addEventListener('click',function(){
    move(-1);
});
setInterval(function (){
    nextItem.addEventListener('click',move(1));
},2500);