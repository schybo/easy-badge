var c=document.getElementById("myCanvas");
var ctx=c.getContext("2d");
var imageObj1 = new Image();
var imageObj2 = new Image();
imageObj1.src = "/picture.png"
imageObj2.src = "/badge-ring3.png";
imageObj1.onload = function() {
   ctx.drawImage(imageObj1, 0, 0, 100, 100);
   imageObj2.onload = function() {
      ctx.drawImage(imageObj2, 15, 85, 100, 100);
      var img = c.toDataURL("image/png");
      document.write('<img src="' + img + '" width="100" height="100"/>');
   }
};