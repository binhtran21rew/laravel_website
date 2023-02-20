$('.checkbox_parent').on('click', function(){
    $(this).parents('.parent').find('.checkbox_child').prop('checked', $(this).prop('checked'));
})