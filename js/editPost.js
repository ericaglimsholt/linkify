const show = document.querySelectorAll('.editPost');
show.forEach(function(showed)
{
    const parent = showed.parentElement.parentElement.parentElement;
    showed.addEventListener("click", function(event){
        parent.querySelector('.editDiv').style.display='block';
        event.preventDefault();
    });
});

