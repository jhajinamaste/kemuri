$(document).ready(function(){
  let loader = $(".pageLoader");

  // INITIALIZE DATEPICKER
  $(".theDatePicker").on('click', function(){
    new dateDropper({
      selector: ".theDatePicker"
    });
  });
  
  // INITIALIZE SELECT2
  $('.company').select2();

  // FORM SUBMIT
  $(".action").on('click', function(e){
    e.preventDefault();

    let form = $(this).closest('form');
    let data = form.serialize();
    let url = form.attr('action');
    
    $.ajax({
      url: url,
      method: 'POST',
      cache: false,
      dataType: 'JSON',
      data: data,
      beforeSend: function(){
        loader.fadeIn();
      },
      success: function(data){
        loader.fadeOut(function(){
          if(data.msg != ''){
            Swal.fire({
              icon: data.status,
              title: (data.status == 'success')?'Success':'Oops...',
              text: data.msg
            });
          }else{
            $("#result").fadeIn();
            $('.shares').html(data.shares);
            $('.mean').html(data.average);
            $('.variance').html(data.variance);
            $('.sd').html(data.standardDeviation);
            $('.profitBuyDate').html(data.profitData.buyDate);
            $('.profitSellDate').html(data.profitData.sellDate);
            $('.profitBuyPrice').html(data.profitData.buyPrice);
            $('.profitSellPrice').html(data.profitData.sellPrice);
            $('.profitPerShare').html(data.profitData.perShare);
            $('.profitTotal').html(data.profitData.total);
            $('.lossBuyDate').html(data.lossData.buyDate);
            $('.lossSellDate').html(data.lossData.sellDate);
            $('.lossBuyPrice').html(data.lossData.buyPrice);
            $('.lossSellPrice').html(data.lossData.sellPrice);
            $('.lossPerShare').html(data.lossData.perShare);
            $('.lossTotal').html(data.lossData.total);
          }
        });
      }
    });
  });

  // UPLOAD FILE
  $('.uploadFile').on("click", function(e){  
    e.preventDefault();
    
    let form = $(this).closest('form');
    let data = new FormData($("#uploadForm")[0]);
    let url = form.attr('action');
    
    $.ajax({  
      url: url,  
      method: "POST",  
      cache: false,
      dataType: 'JSON',
      data: data,  
      contentType: false,
      processData: false,
      beforeSend: function(){
        loader.fadeIn();
      },
      success: function(data){  
        loader.fadeOut(function(){
          Swal.fire({
            icon: data.status,
            title: (data.status == 'success')?'Success':'Oops...',
            text: data.msg
          });
          form[0].reset();
        });
      }  
    })  
  });  
});