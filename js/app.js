var ropecount = 0;
// insert image above the first existing image in main-tag
function insertImageAbove() {
    var topImage = document.querySelector('.hangman')
    var image = document.createElement('img');
    image.src = 'img/rope.png';
    image.style.display = 'block';
    image.setAttribute('class', 'hangman offset-1 ps-1 ps-md-2');
    topImage.insertBefore(image, topImage.firstChild);
    ropecount++;
}

//listen for scroll event and when at the top of the screen load an image above the first image in the main tag
window.addEventListener('scroll', () => {
    if (window.scrollY == 0) {
        if (ropecount < 100) {
            insertImageAbove();
        } else {
            window.alert("You reached the top!");
        }
    }
})
//listen for mousewheel movement check if going up and at the top of the screen
window.addEventListener('wheel', (e) => {
    if (window.scrollY == 0 && e.deltaY < 0) {
        if (ropecount < 100) {
            insertImageAbove();
        } else {
            window.alert("You reached the top!");
        }
    }
})