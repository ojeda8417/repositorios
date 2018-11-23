 $(document).ready(function() {
        
       $("#content").load("views/home.html");

});

function loadhome(){
	$("#content").load("views/home.html");
	$('#1').attr("class", "active"); 
	$('#2').attr("class", ""); 
	$('#3').attr("class", ""); 
	$('#4').attr("class", ""); 
	$('#5').attr("class", ""); 
	$('#6').attr("class", "");
	$('#7').attr("class", ""); 
}

function loadlista(){
	$("#content").load("views/lista_espera.html");
	$('#1').attr("class", ""); 
	$('#2').attr("class", "active"); 
	$('#3').attr("class", ""); 
	$('#4').attr("class", ""); 
	$('#5').attr("class", ""); 
	$('#6').attr("class", "");
	$('#7').attr("class", ""); 
}

function loadalta(){
	$("#content").load("views/alta_espera.html");
	$('#1').attr("class", ""); 
	$('#2').attr("class", "");
	$('#3').attr("class", "active"); 
	$('#4').attr("class", "");
	$('#5').attr("class", "");
	$('#6').attr("class", "");
	$('#7').attr("class", ""); 
}

function loadestadisticas(){
	$("#content").load("views/estadisticas.html");
	$('#1').attr("class", "");
	$('#2').attr("class", "");
	$('#3').attr("class", ""); 
	$('#4').attr("class", "active");
	$('#5').attr("class", ""); 
	$('#6').attr("class", "");
	$('#7').attr("class", ""); 
}

function loadalumnos(){
	$("#content").load("views/alumnos.html");
	$('#1').attr("class", "");
	$('#2').attr("class", "");
	$('#3').attr("class", ""); 
	$('#4').attr("class", "");
	$('#5').attr("class", "active");
	$('#6').attr("class", "");
	$('#7').attr("class", ""); 
}

function loadguia(){
	$("#content").load("views/guia.html");
	$('#1').attr("class", "");
	$('#2').attr("class", "");
	$('#3').attr("class", ""); 
	$('#4').attr("class", "");
	$('#5').attr("class", "");
	$('#6').attr("class", "active"); 
	$('#7').attr("class", ""); 
}

function loadClock(){
    window.open("http://10.10.10.194/escolaresPI/test/new/turnos.html",'_blank','fullscreen=yes,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width='+$( window ).width()+',height='+$( window ).height()+'');	
    $('#1').attr("class", "");
	$('#2').attr("class", "");
	$('#3').attr("class", ""); 
	$('#4').attr("class", "");
	$('#5').attr("class", "");
	$('#6').attr("class", ""); 
	$('#7').attr("class", "active"); 
}