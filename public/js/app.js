$(document).ready(function() {
    $('#main').on('click', 'a.chanson',function(e){
        e.preventDefault();
        var f = $(this).attr('data-file');
        
        var audio = $('#player');
        audio.attr('src',f);
        audio[0].load();
        audio[0].play();
    });
    
    $('#search').submit(function(e) {
        e.preventDefault();
        window.location.href = "/recherche/"+e.target.elements[0].value;
    })
    
    $('#main').on('click', '.play-pause-icon',function(){
        var audio = $('#player');
        
       if($('#playPause').attr('class') == "fas fa-play play-pause-icon") {
           console.log($('#playPause').attr('class'));
           audio[0].play();
           $('#playPause').attr('class', "fas fa-pause play-pause-icon");
           
       } else {
           console.log($('#playPause').attr('class'));
           audio[0].pause();
           $('#playPause').attr('class', "fas fa-play play-pause-icon");
        }
        
    });
    
    $('#main').on('click', '.volume-btn i',function(e){
        var speaker = $('#speaker');
          if($('.volume-btn i').attr('class') == "fas fa-volume-down") {
            speaker.volume = 100+"%";
            speaker.attr('class', 'fas fa-volume-up'); 
          } else {
            speaker.volume = 0;
            speaker.attr('class', 'fas fa-volume-down');
          }
        
    });
    
    $("#testajax").click(function(e) {
        e.preventDefault();
        
        .ajax({
            type: "GET",
            url: "/testajax ",
            data : {
                login: "Gilles",
                mdp: "aud123",
            },
            success : function(data, textStatus, jqXHR) {
                $("#aremplir").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });
    });
});