$(".page-scroll").on("click", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let elementHref = $(href);
    $("html, body").animate(
        {
            scrollTop: elementHref.offset().top - 120,
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

window.addEventListener("load", function () {
    // Mengecek URL halaman
    if (
        window.location.href != "http://localhost:8000/" &&
        window.location.href != "http://127.0.0.1:8000/" &&
        window.location.href != "http://localhost:8000/posts" &&
        window.location.href != "http://127.0.0.1:8000/posts" &&
        window.location.href != "http://localhost:8000/wishlist" &&
        window.location.href != "http://127.0.0.1:8000/wishlist"
    ) {
        var container = document.getElementById("items");

        var previousTop =
            container.getBoundingClientRect().top + window.pageYOffset;

        $("html, body").animate(
            {
                scrollTop: previousTop + 50,
            },
            200,
            "easeInBounce"
        );
    }
});

document.getElementById("phone").addEventListener("input", function () {
    var input = this.value;
    input = input.replace(/\+|-/g, ""); // Menghapus tanda "+" atau "-"
    input = input.replace(/[^\d]/g, ""); // Menghapus karakter selain digit

    // Memastikan angka pertama tidak diisi dengan 0 dan diganti dengan 62
    if (input.startsWith("0")) {
        input = "62" + input.substr(1);
    }

    this.value = input;
});
