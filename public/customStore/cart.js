function addToCart(e){
    e.preventDefault();
    let urlCart = $(this).data('url');
   
    $.ajax({
        url: urlCart,
        dataType: "json",
        success: function(data){
            if(data.code === 200){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
                  
                  Toast.fire({
                    icon: 'success',
                    title: 'Đã thêm vào giỏ hàng'
                  })
            }
        },
        error: function(){

        }
    })
}
$(function(){
    $('.add_to_cart').on('click', addToCart)
   $('.cart-update').on('click', updateCart)
   $('.cart-delete').on('click', deleteCart)

});
 


function updateCart(e){
  e.preventDefault();
  let urlUpdate = $('.update-cart-url').data('url');
  let id = $(this).data('id');
  let quantity = $(this).parents('tr').find('input.quantity').val();
  $.ajax({
    url: urlUpdate,
    data: {
      id: id,
      quantity: quantity
    },
    success: function(data){
      if(data === 200){
          $('.card_wrapper').load(data.cartView);
          alert('thanh cong');
      }
    },
    error: function(){

    }
  })
}

function deleteCart(e){
  e.preventDefault();
  let urlDelete = $('.cart').data('url');
  let id = $(this).data('id');
  $.ajax({
    url: urlDelete,
    data: {
      id: id
    },
    success: function(data){
      if(data === 200){
          $('.card_wrapper').html(data.cartView);
          alert('thanh cong');
      }
    },
    error: function(){

    }
  })
}

$(document).ajaxStop(function(e){
  window.location.reload();
});