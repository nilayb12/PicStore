var figs = document.getElementsByTagName('figure');
for (const fig of figs) {
    fig.style.width = window.innerHeight / 2.5 + 'px';
}
window.addEventListener('resize', () => {
    for (const fig of imgs) {
        fig.style.width = window.innerHeight / 2.5 + 'px';
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

$('#delConfirm').click(function () {
    $("#deleteBtn").click();
});

var imgNames = document.querySelectorAll('.figure-caption');
['keyup', 'click'].forEach(function (e) {
    document.getElementById('searchBox').addEventListener(e, (e) => {
        imgNames.forEach((imgName) => {
            if (!imgName.innerHTML.toLowerCase().includes(e.target.value)) {
                imgName.parentElement.parentElement.style.display = 'none';
            } else {
                imgName.parentElement.parentElement.style.display = 'inline-block';
            }
        });
    });
});
// $('#uplConfirm').click(function () {
//     $.ajax({
//         type: "POST",
//         url: "dbUpload.php",
//         data: { action: "true" },
//         success: function (data) {
//             alert(data);
//         }
//     })
// });
var chk = document.getElementsByName('imgSelect[]');
document.getElementById('imgCount').innerText = chk.length;
$('#selectAll').click(function () {
    // for (var i = 0; i < chk.length; ++i) {
    //     if (chk[i].checked == false) {
    //         chk[i].checked = true;
    //     } else {
    //         chk[i].checked = false;
    //     }
    // }
    chk.forEach((chk) => {
        if (chk.checked == false) {
            chk.checked = true;
        } else {
            chk.checked = false;
        }
    });
    $(this).toggleClass('btn-outline-success btn-outline-warning')
    $(this).find('i').toggleClass('bi-check-square-fill bi-x-square-fill');
});