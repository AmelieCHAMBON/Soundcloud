
$(document).ready(function() {
    
    $(document).pjax('[data-pjax] a, a[data-pjax]','#main');
    $(document).pjax('[data-pjax-toggle] a, a[data-pjax-toggle]','#main',{push:false});
    
    $(document).on('submit', 'form[data-pjax]', function(e){
        $.pjax.submit(e, '#main');
    })
    
    
    toastr.options = {
        'closeButton': false,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': "toast-top-right",
        'preventDuplicates': false,
        'onclick': null,
        'showDuration': '300',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut'
    }

    $('#main').on('click', 'a.chanson',function(e){
        e.preventDefault();
        var f = $(this).attr('data-file');
        console.log(f);
        var audio = $('#player');
        console.log(audio);
        audio.attr('src',f);
        audio[0].load();
        audio[0].play();
    });
    
    $('#search').submit(function(e) {
        e.preventDefault();
        if($.support.pjax) {
            $.pjax({url: "/recherche/" + e.target.elements[0].value, container:'#main'});
        } else {
            window.location.href = "/recherche/"+e.target.elements[0].value;
        }
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
        
        $.ajax({
            type: "GET",
            url: "/testajax",
            success : function(data, textStatus, jqXHR) {
                $("#aremplir").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });
    });
    
    let player = document.querySelector("#player");
    player.addEventListener("timeupdate", function() {
        let currentTime = player.currentTime;
        let duration = player.duration;
        let position = (100*currentTime)/duration;
        $("#progress-pin").css("width", position+"%");
    });
    
});