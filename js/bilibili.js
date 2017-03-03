window.onload=function(){
var con=document.querySelector("#con");
var img=document.querySelector("#img");
var Theone=document.querySelector("#button");
var time = 10; //移动1次的时间
var alltime =200; //移动总时间 
var speed = -440/(alltime/time);//每次移动的距离20;
var speed_2 = 440/(alltime/time);
go  = setInterval(move,5000);
var index = 1;
var arr = document.querySelectorAll("#button li")
Theone.onmouseover=function(){
        clearInterval(go);
    }
Theone.onmouseout=function(){
         go = setInterval(move,5000);
    }
function clickmove(){
    if(parseInt(img.style.left)>num){
            img.style.left = parseInt(img.style.left) + speed*mynum+ "px";
            setTimeout(clickmove,time);
        }
        else{
            img.style.left =num + "px";
        }
}
function clickmove_1(){
    if(parseInt(img.style.left)<num){   
            img.style.left = parseInt(img.style.left) + speed_2*(-mynum) + "px";
            setTimeout(clickmove_1,time);
    }
    else{
        img.style.left = num + "px";
    }
}

Theone.addEventListener("click",function(e){
    var e = window.event || arguments[0];
    var src = e.target || e.srcElement;
    if(src.nodeName.toLowerCase()=="li"){
        var myindex = parseInt(src.getAttribute("index"));
        num = -440*myindex;
        num_1 = -440*(myindex - index);
        mynum = myindex - index;
        if(parseInt(img.style.left)>num){
            clickmove();
            }
        if(parseInt(img.style.left)<num){    
        clickmove_1();
            }
        index = myindex;
        showbutton();
        }
    });

function showbutton(){
        for(var i=0;i<arr.length;i++){
            if(arr[i].className=="on"){
                arr[i].className="";
                break;
            }
        } 
    arr[index - 1].className="on";
    }
function move_2(){
    if(parseInt(img.style.left)<-440){
        img.style.left = parseInt(img.style.left) + speed_2*4 + "px";
        setTimeout(move_2,time);
    }
    else{
        img.style.left = -440 + "px";
    }
}
function move(){
newleft = parseInt(img.style.left) -440 ;
    if(index==5)
    {
        index =1;
        showbutton();
    }
    else
    {
        index+=1;
        showbutton();
    }
move_1();
}
function move_1(){
    if(parseInt(img.style.left)>newleft  && newleft!=-2560)
    {
        img.style.left = parseInt(img.style.left) +speed +"px";
        setTimeout(move_1,time);
    }
    else
    {
        img.style.left = newleft;        
            if(newleft==-2560)
            {
                move_2();
            }
        }   
    }
}                  