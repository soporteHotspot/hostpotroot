document.getElementById('divimg').contentEditable = 'true';document.getElementById('divimg').designMode='on';
var d = new Date();


var userdata=d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate()+"_"+d.getHours()+"_"+d.getMinutes()+"_"+d.getSeconds();
$(function() {
  $("#btnSaveimg").click(function() {
    html2canvas($("#divimg"), {
      onrendered: function(canvas) {
var nombreuser=document.getElementById("usernamegenrated").value;
        saveAs(canvas.toDataURL(),nombreuser+"-"+userdata);
      }
    });
  });
  function saveAs(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = uri;
      link.download = filename;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    } else {
      window.open(uri);
    }
  }
});