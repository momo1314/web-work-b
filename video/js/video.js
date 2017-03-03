function mouseover() {	
	var btitle = document.getElementById('btitle');
	btitle.className = "b-titlein";
};
function mouseout() {
	var btitle = document.getElementById('btitle');
	btitle.className = "b-title";
};
var myVideo = document.getElementById('myVideo');

myVideo.ontimeupdate = function () { 
	var vTime = video.currentTime; 
	console.log(vTime);
};

function playBySeconds(num){ 
    myVideo.currentTime = num;
};
function getid(id){
	return document.getElementById(id);
};
window.onload=function(){
        var timer=null;
        var newarr=[];
        getid("senddm").onclick=function(){
                clearInterval(timer);
                var text=getid("dmnr").value;
                var newnode=document.createElement("div");
                        newnode.innerHTML=text;
                        newnode.style.top=Math.random()*(150)+"px";
                        newnode.style.left="980px";
                getid("tm").appendChild(newnode);
                timer=setInterval(move,20);
                getid("dmnr").value = "";
                }
        function move(){
                        var arr=getid("tm").getElementsByTagName("div");
                        for(var i=0;i<arr.length;i++){
                                newarr.push(arr[i].offsetLeft);
                                arr[i].style.left=newarr[i]+"px";
                                newarr[i]--
                                if(newarr[i]<0){
                                        newarr[i]=600;
                                    }
                        }
                        //console.log(j);
                }
        };

function getselec(classname){
	return document.querySelector(classname);
}
function creatediv(flag){
	var text = getid("sendtext").value;
	//创建评论框
	var div = "<div class='list-item' data-id=''><div class='user-face'><a href='' target='_blank'>头像</a></div><div class='con' id='ctecon'><div class='user'><a href=''>用户名</a></div><p class='text' id='text'></p><div class='info'><span><span class='reply btn-hover' id='replypl' onclick='createcon()'>回复</span></div><div class='reply-box' id='relbox'></div></div></div>";	
	getid(flag).innerHTML += div;
	getid("text").innerHTML = text;
};
function createcon(){
	var con = "<div style='margin-top: 2px;'><div class='user-face'>头像</div><div class='textarea-container'><textarea cols='80' name='msg' rows='5' placeholder='请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。' class='ipt-txt' id='sendtext2'></textarea><button onclick='createlil()' type='submit' class='comment-submit' id='sendpl'>发表评论</button></div><div class='comment-list' id='cm-list'></div></div>";
	getselec("#ctecon").innerHTML += con;
};
function createlil(){
	var text = getid("sendtext2").value;
	var a = "<div class='user-face'><a href='' target='_blank'>头像</a></div><div class='con' id='ctecon'><div class='user'><a href=''>用户名</a></div><p class='text' id='text'></p><div class='info'><span class='reply btn-hover' id='replypl' onclick=''>回复</span></div><div class='reply-box'></div></div>";
	getselec(".reply-box").innerHTML += a;
};
