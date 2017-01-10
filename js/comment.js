// Show the comment field
const showed = document.querySelectorAll('.commentBut');
showed.forEach(function(showing)
{
    let parent = showing.parentElement.parentElement;
    showing.addEventListener("click", function(event){
        parent.querySelector('.comments').style.display='flex';
    event.preventDefault();
});
});

// Hide the comment field
let hide = document.querySelectorAll('.del');
hide.forEach(function(deleting)
{
    let parent = deleting.parentElement.parentElement;
    deleting.addEventListener("click", function(event){
        parent.querySelector(".comments").style.display = "none";
    });
});



