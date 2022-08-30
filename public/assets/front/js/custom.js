
  $("#add-new-address").click(function () {
    $("#new-address-form").css("display", "block");
});

  $("#delivery-address-from-cancel").click(function () {
    $("#new-address-form").css("display", "none");
});


let delivery = $(".delivery-address-at-checkout").val();
if(delivery){
  $("#cb2").removeAttr("disabled");
  $("#cb3").removeAttr("disabled");
}