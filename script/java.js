function load_ajax(url , callback){
    var xhr = new XMLHttpRequest();
     xhr.onreadystatechange = cekstatus;
 
     function cekstatus(){
         if(xhr.readyState === 4 && xhr.status === 200){
             callback(xhr.responseText);
         }
     }
     xhr.open('GET', url , true);
     xhr.send();
 
 }
 document.getElementById('tombol').onclick = function (){
     text = document.getElementById('txt1').value;
 
     load_ajax('core/halaman.php?q='+ text, function(data){
         document.getElementById('test').innerHTML= data;
     });
 
     
 };