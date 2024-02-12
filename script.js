// document.getElementById('selectFolder').addEventListener('change', (ev) => {
//     $.ajax({
//         type: "POST",
//         url: "dbUpload.php",
//         data: { fold: ev.target.value },
//         success: function (data) {
//             alert(data);
//         }
//     })
// });
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
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
document.getElementById('chkboxToggle').addEventListener('click', () => {
    $('.form-check-input').toggle();
    $('#selectAll').toggle();
    $('#deleteBtnLink').toggle();
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