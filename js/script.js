$( document ).ready(function() {
    $("#test_cat .partner").click(function () {
        if(!$(this).hasClass('active')){
            $("#test_cat .partner").removeClass('active');
            $(".test_more .blocks_questions").removeClass('act');
            $(".test_more").hide();
            $(this).addClass('active');
            $("."+$(this).data('id')+'').show();
        }
        else{
            $(this).removeClass('active');
            $("."+$(this).data('id')+'').hide();
        }
    });

    $(".test_more .blocks_questions").click(function () {
        if(!$(this).hasClass('act')){
            $(".test_more .blocks_questions").removeClass('act');
            $(this).addClass('act');
        }
        else{
            $(this).removeClass('act');
        }
    });
});
