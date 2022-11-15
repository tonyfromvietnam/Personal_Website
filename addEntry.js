let clearButton = document.querySelector('input[type="reset"]').addEventListener('click', clearBlog);
let sumbitButton = document.querySelector('input[type="submit"]').addEventListener('click', addBlog);

// Event processing for clicking the “Clear” button in addPost.html
//
function clearBlog(e) {
    if (!window.confirm('Are you sure to clear the cotent?')) {
        e.preventDefault();
    }
}


// Event processing for clicking the "Submit" button in addPost.html
//
function addBlog(e) {
    if (document.getElementById('blogTitle').value == "") {
        document.getElementById('blogTitle').style.border = "solid red 3pt";
        e.preventDefault();
    } else {
        document.getElementById('blogTitle').style.border = "none";
    }
    
    if (document.getElementById('blogContent').value == "") {
        document.getElementById('blogContent').style.border = "solid red 3pt";
        e.preventDefault();
    } else {
        document.getElementById('blogContent').style.border = "none";
    }
}
