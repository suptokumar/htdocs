$( function() {
$( ".date-picker" ).datepicker({
    dateFormat: 'yy-mm-dd'
});
} );
$('.clockpicker').clockpicker({
placement: 'bottom',
align: 'left',
donetext: 'Done'
});
function port($url,$val, $id,$token,t) {
  $(t).attr("disabled","disabled");
  $.ajax({
     type:'POST',
     url:$url,
     data:"val="+$val+"&&id="+$id+"&&_token="+$token,
     success:function(data) {
        var v = JSON. parse(data);
        var fst = $(".fst").html();
        var snd = $(".snd").html();
        $(".march_"+v[0]).fadeOut('slow');
        scole(v[1]*100,fst*1,".fst");
        scole(v[2]*100,snd*1,".snd");
     }
  });
}
function del($url,$val, $id,$token,t) {
  $(t).attr("disabled","disabled");
  $.ajax({
     type:'POST',
     url:$url,
     data:"val="+$val+"&&id="+$id+"&&_token="+$token,
     success:function(data) {
        var v = JSON. parse(data);
        $(".march_"+v[0]).fadeOut('slow');
     }
  });
}

function scole(n1,n2,cls){
  var x = setInterval(function(){
    if (Math.ceil(n1)==Math.ceil(n2)) {
      clearInterval(x);
    }else{
      if (n1>n2) {
      $(cls).html(n2);
      n2++;
      }else{
      $(cls).html(n2);
      n2--;
      }
    }
  },100);
}
function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

$(function(){
  $(".day_ml").click(function(){
    var rm  = $("#days").val();
    var mr = rm.split(",");
    if (mr.includes($(this).val())) {
      mr = removeA(mr, $(this).val());
      $(this).removeClass('selected');

    }else{
    $(this).addClass('selected');
      mr.push($(this).val());
    }
    // var val = mr.toString();
    $("#days").val(mr);
  });
});