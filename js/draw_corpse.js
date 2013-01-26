$(function() {
  var canvas = $("#drawing");
  var context = canvas[0].getContext('2d');
  context.fillStyle = "#fff";
  context.fillRect(0,0,canvas.width(),canvas.height());
  var button_is_down = false;

  $(document).mouseup(function() {
    button_is_down = false;
    $('body').removeClass('noselect');
  });

  canvas.mousedown(function(e) {
    var x = e.pageX - this.offsetLeft;
    var y = e.pageY - this.offsetTop;
    context.beginPath();
    context.moveTo(x,y);
    $('body').addClass('noselect');
    button_is_down = true;
  });

  canvas.bind('mousemove mouseup',function(e) {
    if(button_is_down) {
      var x = e.pageX - this.offsetLeft;
      var y = e.pageY - this.offsetTop;
      context.lineTo(x,y);
      context.stroke();
    }
  });

  $("button#save").click(function(e) {
    var url = canvas[0].toDataURL('image/png');
    $.post("save_image.php",{ image: url },function(data) {
      $("#previous").append("<div class=\"prevdiv\"><img class=\"previmg\" width=\"250\" height=\"100\" src=\"" + data + "\"/></div>");
    },'text').fail(function() {
      $("#debug").append("<div class=\"dbout failed\">failed</div>");
    });
    // $("#debug").append("<div class=\"dbout\"><img class=\"previmg\" width=\"250\" height=\"100\" src=\"" + url + "\"/></div>");
  });


});

