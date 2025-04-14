
    window.addEventListener("load", function() {
        const loader = document.getElementById("loader");
        const page = document.getElementById("page");

        loader.style.opacity = "0";
        setTimeout(() => {
            loader.style.display = "none";
            page.style.display = "block";
            page.style.opacity = "1";
        }, 500); // Smooth transition after loader disappears
    });


     // Hide Loader & Show Content Smoothly
     window.onload = function () {
        setTimeout(function () {
            document.getElementById("loader").style.opacity = "0";
            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
                document.querySelector(".main-content").style.opacity = "1"; 
            }, 150);
        }, 250);
    };