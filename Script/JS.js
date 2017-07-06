    
  setTimeout(UsunKomunikat, 3000);

  function Pokaz_panel(){
  
    $( ".Logowanie" ).dialog({
		
	my: "center",
    at: "center",
    modal: true,

   of: window});
   
  }
  function UsunKomunikat()
  {
	  $( "#Komunikat" ).fadeOut( "slow");
  }


$( document ).ready(function() {
 $.ajax({
     url: 'Controler/AJAX_HANDLER.php',
     data: "",

     dataType: 'json',
     success: function (data) {

         if (data >= 10) {
             $("#Formularz").hide();
             $("#napis").hide();
             $("#Wyprzedane").show();
         }
         if (data >= 9) {
             $("#2").hide();
             $("#3").hide();
         }
         if (data >= 8) {
             $("#3").hide();

         }

     }

 }); 
});