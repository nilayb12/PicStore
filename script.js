let imgs = document.getElementsByTagName('img');
for (const img of imgs) {
    img.style.height = window.innerHeight / 5 + 'px';
}
window.addEventListener('resize', () => {
    for (const img of imgs) {
        img.style.height = window.innerHeight / 5 + 'px';
    }
});
const gallery = new Viewer(document.getElementById('imgContainer'), {
    shown() {
        document.getElementById('viewer0').addEventListener('contextmenu', (e) => {
            e.preventDefault();
        });
    }
});
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
document.getElementById('chkboxToggle').addEventListener('click', () => {
    $('.form-check-input').toggle();
});
$('#deleteBtnLink').click(function () {
    $("#deleteBtn").click();
})
document.getElementById('selectAll').addEventListener('click', () => {
    var chk = document.getElementsByName('imgSelect[]');
    for (var i = 0; i < chk.length; ++i) {
        if (chk[i].checked == false) {
            chk[i].checked = true;
        } else {
            chk[i].checked = false;
        }
    }
});
// }