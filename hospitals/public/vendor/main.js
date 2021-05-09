function generate_pagination($total, $page, $limit, $function){
if(Math.ceil($total/$limit)==1){ return '';}
var result = '<nav aria-label="Page navigation example" style="text-align: center;"> <ul class="pagination justify-content-end" style="">';
if($page==1){result+='<li class="page-item disabled"> <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a> </li>'; }
else{result+='<li class="page-item" onclick="'+$function+'('+(Number($page)-1)+')"> <a class="page-link" href="javascript:void(0)">Previous</a> </li>';}
    
for (var i = 0; i < ($total/$limit); i++) {
	var from = $page - 4;
	var to = ($page*1 + 4);
	// return from +" "+ to;
	if ((i+1)<to && (i+1)>from) {
		if (i+1==$page) {
	result += '<li class="page-item active" onclick="'+$function+'('+(i+1)+')"><a class="page-link" href="javascript:void(0)">'+(i+1)+'</a></li>';

		}else{

	result += '<li class="page-item" onclick="'+$function+'('+(i+1)+')"><a class="page-link" href="javascript:void(0)">'+(i+1)+'</a></li>';
		}
	}
}
console.log(($total/$limit));
if($page==Math.ceil($total/$limit)){result+='<li class="page-item disabled"> <a class="page-link" href="javascript:void(0)" tabindex="-1">Next</a> </li>'; }
else{result+='<li class="page-item" onclick="'+$function+'('+(Number($page)+1)+')"> <a class="page-link" href="javascript:void(0)">Next</a> </li>';}
result+='  </ul> </nav>';
return result;
}
function public(){
	return "http://localhost/hospitals/public/";
}
function url(v=""){
	return "http://localhost/hospitals/"+v;
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
function countdown(val,id,time){
  let i = Number(val);
  var x =setInterval(function(){
    if (i==(Number(val)+1)) {
      clearInterval(x);
    }else{
      $("#"+id).html(i);
    }
    i++;
  },time);
}
function direct(val,id,time){

      $("#"+id).html(val);

}