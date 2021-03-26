// Get the modals
var modal = [];
var modalN = document.getElementsByClassName('modal').length;
for(var i=0;i<modalN ;i++){
    modal.push( document.getElementsByClassName('modal')[i].getAttribute('id'));   
}

var span = document.getElementsByClassName("close");
var spanA = [];
for(var i=0; i<span.length ;i++){
    spanA.push(span[i]);
}

// Get the buttons that opens the modal
var btn = [];
var btnN = document.getElementsByClassName('continue_reading_btn').length;
for(var i=0;i<btnN ;i++){
    btn.push(document.getElementsByClassName('continue_reading_btn')[i].getAttribute('id'));   
}

btn.forEach(function(element){
   var  Element= document.getElementById(element);
    
    Element.onclick = function(){
      for(var i=0;i< modal.length ;i++){
          if(btn.indexOf(element) == i){
              var item = document.getElementById(modal[i]);
                item.style.display = "block";
                spanA[i].onclick = function(){
                    item.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == item) {
                        item.style.display = "none";
                      }
                }
          }
      }
    }
});

/* Delete Blog Script */
function deleteBlog(element){
    var confirmDelete = confirm('Are you sure you want to delete this blog?');
    if(confirmDelete == true){
       document.getElementById(element).style.display = "none";
    }
}

