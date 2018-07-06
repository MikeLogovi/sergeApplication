var reloadTime=20000;
var timeout=3000;
function getIMessage(){
   $.getJSON('src/view/application/inbox/inboxGetMessage.php',function(data){
         $('centre').remove();
         $('#inboxMessage').html(data);

  });
}
function postIMessage(){
  var message=$('#Imessage').val();
  var titre=$('#Ititre').val();
  //var donnee={message,titre};
  $.ajax({
    type:'POST',
    url:'src/view/application/inbox/inboxPostMessage.php',
    data:{'message':message,
          'titre':titre
         },
    success:function(){
      getIMessage();
      $('#Imessage').val('');
      $('#Ititre').val('');
      $('#beep')[0].play();
      }
  });

}
$(function(){

    window.setTimeout(getIMessage,timeout);
   window.setInterval(getIMessage,reloadTime);
  //$("#f-main").animate({"scrollTop":$("#f-main").height()}, "slow");
  $('body').append("<audio id='beep'><source type='audio/mpeg' src='src/view/application/forum/forum_style/son2.mp3' >");
  $('#Imessage').focus();

  $('#Ienvoyer').click(function(){
     postIMessage();
  });
});
