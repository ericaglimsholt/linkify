document.querySelector('.deleteBut').addEventListener("click", function() {

  if (confirm('Are you sure you want to delete your post?')) {
    document.querySelector('.post').style.display='none';
  } else {
      // Do nothing!
  }

});
