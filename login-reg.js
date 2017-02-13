var code;
window.onload = function createcode() {
	code = "";
	var codeLength = 4 ;
	var checkcode = document.getElementById('code');
	var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R',
     'S','T','U','V','W','X','Y','Z');
	for (var i = 0; i < codeLength; i++) {
		var index = Math.floor(Math.random()*36);
		code += random[index];
	}
	checkcode.value = code;
};
function xsyzm(){
	document.getElementById('code').style.display = "inline-block";
};
function yanzheng(){  
    var inputCode = document.getElementById("input").value.toUpperCase(); //取得输入的验证码并转化为大写        
    if(inputCode.length <= 0) {  
        alert("请输入完整验证码");  
    }         
    else if(inputCode != code ) {  
        alert("验证码输入错误"); 
        createCode();
        document.getElementById("input").value = "";
    }         
    else {  
        alert('验证成功!');
    }             
};
