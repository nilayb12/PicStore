var figs = document.getElementsByTagName('figure');
for (const fig of figs) {
    fig.style.width = window.innerHeight / 2.5 + 'px';
}
window.addEventListener('resize', () => {
    for (const fig of figs) {
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

var chk = document.getElementsByName('imgSelect[]');
document.getElementById('chkboxToggle').addEventListener('click', () => {
    $('.form-check-input').toggle();
    $('#selectAll').toggle();
    $('#deleteBtnLink').toggle();
    // $('#chkboxDrop').toggle();
    chk.forEach((chk) => {
        chk.checked = false;
    });
    document.getElementById('selectAll').classList.replace('btn-outline-warning', 'btn-outline-success');
    document.getElementById('selectAll').firstChild.classList.replace('bi-x-square-fill', 'bi-check-square-fill');
});

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

$('#delConfirm').click(function () {
    $("#deleteBtn").click();
});

window.addEventListener("keydown", (e) => {
    if ((e.ctrlKey || e.metaKey) && e.code === 'KeyK') {
        e.preventDefault();
        document.getElementById('searchBox').focus()
    }
})

var imgDetails = document.querySelectorAll('.card');
var cnt = chk.length;
['keyup', 'click'].forEach(function (e) {
    document.getElementById('searchBox').addEventListener(e, (e) => {
        cnt = 0;
        imgDetails.forEach((imgDetail) => {
            if (!imgDetail.innerHTML.toLowerCase().includes(e.target.value.toLowerCase())) {
                imgDetail.style.display = 'none';
            } else {
                imgDetail.style.display = 'inline-block';
                cnt += 1;
            }
        });
        document.getElementById('imgCount').innerText = cnt;
    });
});
document.getElementById('imgCount').innerText = cnt;
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