var x=1;
const admin=document.getElementById('admin');
admin.addEventListener("click",function()
{
    if (x==3) {
        admin.setAttribute("href","/admin");
        admin.style.color="black";
    } else {
       x++; 
    }
});