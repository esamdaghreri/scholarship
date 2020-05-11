require('./bootstrap');
$(document).ready(function(){
    $(".admin-dashboard nav ul li").click(function(){ 
        $(this).toggleClass("active");
        if($('.admin-dashboard nav ul li a i').hasClass('fa-angle-up')){
            $('.admin-dashboard nav ul li a i.fas.fa-angle-up').attr('class', 'fas fa-angle-down');
        }else{
            $('.admin-dashboard nav ul li a i.fas.fa-angle-down').attr('class', 'fas fa-angle-up');
        }
    });
});
