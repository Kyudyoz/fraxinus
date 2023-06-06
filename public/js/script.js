$(".page-scroll").on("click", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let elementHref = $(href);
    $("html, body").animate(
        {
            scrollTop: elementHref.offset().top - 20,
        },
        1000
    );
});

let text = document.getElementById("text");
let bird1 = document.getElementById("bird1");
let bird2 = document.getElementById("bird2");
let btn = document.getElementById("btn");
let rocks = document.getElementById("rocks");
let forest = document.getElementById("forest");
let water = document.getElementById("water");

window.addEventListener("scroll", function () {
    let value = window.scrollY;
    text.style.top = 50 + value * -0.2 + "%";
    bird1.style.top = value * -1.5 + "%";
    bird1.style.left = value * 2 + "%";
    bird2.style.top = value * -1.5 + "%";
    bird2.style.left = value * -5 + "%";
    btn.style.marginTop = value * 1.5 + "px";
    rocks.style.top = value * -0.12 + "px";
    forest.style.top = value * 0.25 + "px";
});

// Memanggil fungsi untuk mengatur scroll hanya ketika URL memenuhi kriteria
window.addEventListener("load", function () {
    // Mengecek URL halaman
    if (window.location.href != "http://localhost:8000/") {
        // Mendapatkan elemen kontainer dengan ID "items"
        var container = document.getElementById("items");

        // Mendapatkan posisi top kontainer sebelum pindah halaman
        var previousTop =
            container.getBoundingClientRect().top + window.pageYOffset;

        // Mengatur posisi scroll ke posisi top sebelumnya
        $("html, body").animate(
            {
                scrollTop: previousTop + 50, // Mengatur posisi scroll dengan efek animasi
            },
            200,
            "easeInBounce" // Durasi animasi dalam milidetik (di sini 1000ms atau 1 detik)
        );
    }
});
