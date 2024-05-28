// document.getElementById('demosMenu').addEventListener('change', function (e) {
//     var dropdown = document.getElementById('demosMenu');
//     window.location.href = dropdown.options[dropdown.selectedIndex].getAttribute('id') + '.html';
// });

// window.onscroll = () => {
//     if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
//         document.getElementById("navbar").style.top = "0";
//     } else {
//         document.getElementById("navbar").style.top = "-70px";
//     }
// }

const logoIG = document.getElementById("logoIG");

$('#navbarNav').on('show.bs.collapse', function () {
    logoIG.style.margin = "auto";
});

$('#navbarNav').on('hidden.bs.collapse', function () {
    logoIG.style.margin = 0;
});
