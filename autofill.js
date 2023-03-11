function autofill(){
var sifra =document.getElementById("sifra").value;

$.ajax({
    url:"nadjiPoSifri.php",
    type:"POST",
    data:{
    id:sifra,
    },
    success:function(data){
        $('#knjigaNaziv').html(data);
    }
    })
}
