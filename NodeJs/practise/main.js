var http = require('http');

var server = http.createServer(function(req,res){
if(req.url=='/home'){
    res.writeHead(200, {"content-type":"text/html"});
    for(var i = 0; i<15000; i++){
        res.write("home <a href='../'>Back</a>");
    }
    res.end();

}else{
    res.writeHead(200, {"content-type":"text/html"});

    res.write("Note Home<a href='/home'>Home</a>");
    res.end();
}
});
server.listen(8080);