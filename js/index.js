function mouseover() {
	var btitle = document.getElementById('btitle');
	btitle.className = "b-titlein";
};
function mouseout() {
	var btitle = document.getElementById('btitle');
	btitle.className = "b-title";
};

var but = document.querySelector('.but');


var nice = function ( data ) {//函数在下面的ajax使用
    // console.log( data );
    document.querySelector('.username').innerHTML = data;
    var str = '['+data+']';
    var json = eval("("+str+")");
    for(var i=0;i<json.length;i++){

 　　　　for(var key in json[i]){

         　　console.log("key："+key+",value："+json[i][key]);

        } ;

 　　} ;


    //var jsonObj = JSON.parse(data);
    // var obj={};
    // for(var i=0;i<jsonObj.length;i++){
    //   var key = jsonObj[i].name;
    //   if(!obj[key]){
    //      obj[key]=[];
    //   }
    //   obj[key][obj[key].length]=jsonObj[i].s;
    // }
    // for(var k in obj){
    //   console.log(obj[k]);
    // }
};

var button = function () {
    var username = document.querySelector('.username').innerHTML;

    ajax({
        method: 'POST',
        url: '../php/check.php',
        data: {
            // 'danmu':danmu,
            // 'time':time
        },
        success:nice,
    });
};

but.addEventListener('click', button);