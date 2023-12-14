document.getElementById("link1").addEventListener("click", function () {
    window.location.href = "page1.html";
});

document.getElementById("link2").addEventListener("click", function () {
    window.location.href = "page2.html";
});

document.getElementById("link3").addEventListener("click", function () {
    window.location.href = "page3.html";
});
const links = document.querySelectorAll('.links a');

function animateLinks() {
    links.forEach((link, index) => {
        setTimeout(() => {
            link.style.opacity = 1;
            link.style.transform = 'translateY(0)';
        }, 500 * index);
    });
}

animateLinks();
