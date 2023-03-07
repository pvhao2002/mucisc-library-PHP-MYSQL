let i = 0
let images = []
const SLIDE_TIME = 3000     // 3 seconds


images[0] = '../assets/img/music.jpg'
images[1] = '../assets/img/music1.jpg'
images[2] = '../assets/img/music2.jpg'

function changePicture() {
    const banner = document.getElementById("banner")
    banner.style.backgroundImage = "url(" + images[i] + ")";

    if (i < images.length - 1) {
        i++
    } else {
        i = 0
    }
    setTimeout(changePicture, SLIDE_TIME)
}
window.onload = changePicture;