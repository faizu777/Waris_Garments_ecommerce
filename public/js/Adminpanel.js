const uploadInput = document.getElementById('uploadInput');
const imageCard = document.getElementById('imageCard');
const uploadedImage = document.getElementById('uploadedImage');

uploadInput.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      uploadedImage.src = e.target.result;
      imageCard.style.display = 'block';
    }
    reader.readAsDataURL(file);
  }
});
var check=true;
function toggle()
{
  const addproductcard=document.getElementById("addproductcard");
if(check)
{
  
    addproductcard.style.display="block";
    
    check=false;
}
else{
  addproductcard.style.display="none";
  check=true;
}
}

document.addEventListener("DOMContentLoaded",function(){







});
















