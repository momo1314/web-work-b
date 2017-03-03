function xsyzm(){
    var yzm = document.getElementById('yzm');
    yzm.style.display = "block";
};
var username = document.getElementById('zh');
var password = document.getElementById('mm');
function getid(id){
	return document.getElementById(id);
};
var checkzf = document.getElementById('denglu');
function checkstr(str){
	var r = /^\\|\'|\"| |\/$/;
	if (r.test(str)) {
		getid("checkfh").style.display="block";
		return false;
	}
	else {
		return true;
	}
};