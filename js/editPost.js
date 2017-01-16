const show = document.querySelectorAll('.editPost');
show.forEach(function(showed)
{
    const parent = showed.parentElement.parentElement.parentElement;
    showed.addEventListener("click", function(event){
        parent.querySelector('.editDiv').style.display='block';
        event.preventDefault();
    });
});

const del = document.querySelectorAll('.del');
del.forEach(function(hide)
{
    const parent = hide.parentElement.parentElement.parentElement;
    hide.addEventListener("click", function(event){
        parent.querySelector(".editDiv").style.display = "none";
    });
});
