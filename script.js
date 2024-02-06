$(document).ready(function () {
// window.onload = function () {
    // const imgClick = document.getElementsByName('img');
    // imgClick.forEach(function(i) {
    //     i.addEventListener('click', () => {
    //         if (document.fullscreenElement) {
    //             document.exitFullscreen();
    //         } else {
    //             i.requestFullscreen();
    //         }
    //     });
    // });
    const gallery = new Viewer(document.getElementById('imgContainer'));
    // $("#toggle").click(function () {
    //     $("img").toggle();
    // });
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    document.getElementById('chkboxToggle').addEventListener('click', () => {
        $('input[type=checkbox]').toggle();
    });
// }
});