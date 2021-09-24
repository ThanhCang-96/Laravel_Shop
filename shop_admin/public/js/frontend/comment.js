$(document).ready(function(){
  $("a#replay").click(function(e){
    e.preventDefault();
    $(this.closest("div.response-area")).find("div#replay-comment").hide();
    $(this.closest("ul.media-list")).find("div#replay-comment").show();
    $(this.closest("div#blog-detail")).find("div#comment").hide()
  });

  $("a.leave-replay").click(function(e){
    e.preventDefault();
    $(this.closest("div.response-area")).find("div#replay-comment").hide();
    // $(this.closest("ul.media-list")).find("div#replay-comment").show();
    $(this.closest("div#blog-detail")).find("div#comment").show()
  });
});