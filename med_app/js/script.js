
// uitvoeren realTime functie
realTime();


function realTime() {
    setInterval(function() {
        $('#poule-a').load('stats/poule_a.php');
        $('#poule-b').load('stats/poule_b.php');  
        $('.topscorer').load('stats/topscorer.php');
        $('#wedstrijdschema').load('stats/wedstrijdschema.php');
        $('#gespeelde_wedstrijden').load('stats/gespeelde_wedstrijden.php');
        $('.nowplaying').load('stats/now_playing.php')
    }, 0);
};

// handler voor resetknop
$('#reset').click(function(){
	if ( confirm('Hiermee reset je alle data van de teams, spelers en wedstrijden. Weet je zeker dat je dit wilt?') )
	{
		location.href='resetData.php?msg=reset';
	}
});	

// handler voor button naar streaming
$('#streaming').click(function(){
    location.href='livestream.php';
});



$(document).ajaxStart(function() {
    $('#loading').show()
});

$(document).ajaxStop(function() {
    $('#loading').hide()
});

