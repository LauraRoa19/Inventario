
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

function isBlank(){
  var blank = 0;
  $("#inpLote").val() == null || $("#inpLote").val() == "" ? blank = 1:"";
  $("#inpProducto").val() == null || $("#inpProducto").val() == "" ? blank = 1:"";
  $("#inpFecha").val() == null || $("#inpFecha").val() == "" ? blank = 1:"";
  $("#inpCantidad").val() == null || $("#inpCantidad").val() == "" ? blank = 1:"";
  $("#inpPrecio").val() == null || $("#inpPrecio").val() == "" ? blank = 1:"";
  blank == 1? $("#btnCreate").attr("disabled","disabled"): $("#btnCreate").removeAttr("disabled");
}

function cleanInp(){
  $("#inpLote").val("");
  $("#inpProducto").val("");
  $("#inpFecha").val("");
  $("#inpCantidad").val("");
  $("#inpPrecio").val("");
}

function enableInp(id){
  $(".inp-edit-" + id).removeAttr("readonly").addClass("inp-show");
  $('#btnUpdate').css("display","block");
  $('#btnCancel').css("display","block");
  $('#btnEdit').css("display","none");
  $('#btnDelete').css("display","none");
}

function disableInp(id){
  $(".inp-edit-" + id).removeClass("inp-show").attr("readonly");
  $('#btnUpdate').css("display","none");
  $('#btnCancel').css("display","none");
  $('#btnEdit').css("display","block");
  $('#btnDelete').css("display","block");
}

function setTotal(quantity){
    var total= $("#inpPrecio").val();
    total = total * quantity;
    $("#inpTotal").val(total);
    var cantTotal = $("#inpCatidad").val();
}
