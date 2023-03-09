$(document).ready(function(){
    prikaziIzBaze();
      $('#dodaj').click(function(){
          var nazivknjiga = $('#imeknjige').val();
          $.ajax({
              url: 'ajax.php',
              type: 'POST',
              data: {
                  'done': 1,
                  'naziv': nazivknjiga
              },
              success: function(data){
                prikaziIzBaze();
              }
          })
      });

  });
  function obrisiRecord(idknjiga){
      $(document).ready(function(){
        
        $.ajax({
          url: 'ajax.php',
          type: 'POST',
          data: {
            idknjiga: idknjiga,
            action: "delete"
          },
          success:function(response){
            if(response == 1){
              prikaziIzBaze();
            } 
          }
        });
      });
    }

  function prikaziIzBaze(){
      $.ajax({
          url: 'ajax.php',
          type:'POST',
          async: false,
          data:{
            'display': 1
          },
          success: function(data){
           $('#prikaz').html(data);

          }

      });
  }