// Show the comment field
document.querySelector('.commentBut').addEventListener("click", function(event){
  document.querySelector('.comments').style.display='flex';
  event.preventDefault();
});

// Hide the comment field
document.querySelector(".del").addEventListener("click", function(){
  document.querySelector(".comments").style.display = "none";
});
