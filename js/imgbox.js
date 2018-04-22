function openbox(id){
    display = document.getElementById(id).style.display;
    if(display=='block'){
        document.getElementById(id).style.display='none';
    }else{
        document.getElementById(id).style.display='block';
    }
}

function bigImage(img){
    var w = window.innerWidth
     || document.documentElement.clientWidth
     || document.body.clientWidth;

    var h = window.innerHeight
     || document.documentElement.clientHeight
     || document.body.clientHeight;
    var nw,nh;
    nw = w;
    nh = Math.floor(img.height/img.width * nw);
    while (nw > w){
      nw = nw - 1;
      nh = Math.floor(img.height/img.width * nw);
    }
    while (nh > h){
      nh = nh - 1;
      nw = Math.floor(img.width/img.height * nh);
    }
    verticalmargin = Math.floor((h - nh) / 2);
    gorizontalmargin = Math.floor((w - nw) / 2);
    var container = document.getElementById('imgBig');
    container.style.display = "block";
    document.getElementById('imgResizerImage').src = img.src;
    document.getElementById('imgResizerImage').width = nw;
    document.getElementById('imgResizerImage').height = nh;
    document.getElementById('imgResizerImage').style.margin = verticalmargin +"px " + gorizontalmargin + "px";
    document.getElementById('imgResizerContainer').width = img.width;
}
var imgBox = {
    active:0,
    images : new Array(),
    append : function(url){
      imgBox.images.push(url);
    },
    clear : function(){
      imgBox.images = new Array();
    },
    appendArray : function(a){
      for (var i = 0; i < a.length; i++)
        imgBox.images.push(a[i]);
    },
    next : function(){
      if(imgBox.active == imgBox.images.length - 1){
        imgBox.active = 0;
      }else{
        imgBox.active++;
      }
      var Img = new Image();
      Img.src = imgBox.images[imgBox.active];
      Img.onload = function(){
        bigImage(Img);
      }

    },
    prev : function(){
      if(imgBox.active == 0){
        imgBox.active = imgBox.images.length - 1;
      }else{
        imgBox.active--;
      }
      var Img = new Image();
      Img.src = imgBox.images[imgBox.active];
      Img.onload = function(){
        bigImage(Img);
      }
    },
    open : function(img){
      var src = img.src;
      for (var i = 0; i < imgBox.images.length;i++){
        if(imgBox.images[i] == src)
          imgBox.active = i;
      }
      openbox('imgBig');
      bigImage(img);
    },
    close : function(){

    }
}