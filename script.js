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
    $('#selectAll').toggle();
    $('#deleteBtnLink').toggle();
    // $('#chkboxDrop').toggle();
});
$('#deleteBtnLink').click(function () {
    $("#deleteBtn").click();
});
$('#selectAll').click(function () {
    var chk = document.getElementsByName('imgSelect[]');
    for (var i = 0; i < chk.length; ++i) {
        if (chk[i].checked == false) {
            chk[i].checked = true;
        } else {
            chk[i].checked = false;
        }
    }
    $(this).toggleClass('btn-outline-success btn-outline-warning')
    $(this).find('i').toggleClass('bi-check-square bi-x-square');
});