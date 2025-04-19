"use strict";
(function () {
    //identify the toggle switch HTML element
    function changeLogoHor(theme) {
        const horImg = document.querySelector('.about--img img');
        if (theme == "dark") {
            horImg.src = "assets/images/logo_hor_white.png";
        } else {
            horImg.src = "assets/images/logo_hor.png";
        }
    }

    const toggleSwitch = document.querySelector('#theme-switch input[type="checkbox"]');
    const toggleSwitchLabel = document.querySelectorAll('.theme-switch-label_mobile');

    //function that changes the theme, and sets a localStorage variable to track the theme between page loads
    function switchTheme(e) {
        if (e.target.checked) {
            localStorage.setItem('theme', 'dark');
            document.documentElement.setAttribute('data-theme', 'dark');
            if (typeof(toggleSwitchLabel) != 'undefined' && toggleSwitchLabel != null)
            {
                toggleSwitchLabel.innerHTML = 'Light mode';
            }
            changeLogoHor("dark");
            toggleSwitch.checked = true;
        } else {
            localStorage.setItem('theme', 'light');
            document.documentElement.setAttribute('data-theme', 'light');
            if (typeof(toggleSwitchLabel) != 'undefined' && toggleSwitchLabel != null)
            {
                toggleSwitchLabel.innerHTML = 'Dark mode';
            }
            changeLogoHor("light");
            toggleSwitch.checked = false;
        }
    }

    //listener for changing themes
    toggleSwitch.addEventListener('change', switchTheme, false);

    //pre-check the dark-theme checkbox if dark-theme is set
    if (document.documentElement.getAttribute("data-theme") == "dark") {
        toggleSwitch.checked = true;
    }
    changeLogoHor(theme);

    // DropDown
    const btnDrop = document.querySelector(".menu--lang-current");
    function toggleDrop(e) {
        document.querySelector(".menu--lang-dropdown").classList.toggle("hide");
    }

    btnDrop.addEventListener("click", toggleDrop);

    var openDropdown = document.querySelector(".menu--lang-dropdown");
    openDropdown.addEventListener("mouseleave", (e) => {
        if (!openDropdown.classList.contains("hide")) {
            openDropdown.classList.add("hide");
        }
    });

    // Mobile Menu
    document.querySelector('.menu--burger').addEventListener('click', e=>{
        document.getElementById("myNav").style.width = "100%";
    });

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    document.querySelector('.closebtn').addEventListener('click', e=>{
        closeNav();
    });

    document.querySelectorAll(".overlay-content a").forEach((element) => {
        element.addEventListener("click", closeNav);
    });

    // Team
    const modal = document.getElementById("myModal");

    const modalBtn = document.querySelectorAll(".modal--btn");

    let currentMember;

    function createIframeElement(link) {
        const myIframe = document.createElement("iframe");
        myIframe.setAttribute("width", "100%");
        myIframe.setAttribute("height", "100%");
        myIframe.setAttribute("allow", "autoplay");
        myIframe.setAttribute("frameborder", "0");
        myIframe.setAttribute("src", link);

        modal.querySelector(".modal-content div").appendChild(myIframe);
        return myIframe;
    }

    modalBtn.forEach((element) => {
        element.addEventListener("click", (e) => {
            modal.style.display = "block";
            switch (element.dataset.member) {
                case "najlae":
                    currentMember = createIframeElement(
                        "assets/videos/video 1 (1).mp4"
                    );
                    break;
                case "imrane":
                    currentMember = createIframeElement(
                        "assets/videos/video 1 (2).mp4"
                    );
                    break;
                case "fatima":
                    currentMember = createIframeElement(
                        "assets/videos/video 1 (3).mp4"
                    );
                    break;
                case "nouhayla":
                    currentMember = createIframeElement(
                        "assets/videos/video_1.mp4"
                    );
                    break;
                default:
                    break;
            }
        });
    });

    window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            currentMember.remove();
            modal.style.display = "none";
        }
    });

    window.onclick = function (e) {
        if (
            !e.target.matches(".menu--lang-current") &&
            !openDropdown.classList.contains("hide")
        ) {
            openDropdown.classList.add("hide");
        }

        if (e.target == modal) {
            currentMember.remove();
            modal.style.display = "none";
        }
    };

    // Testimonials
    const swiper = new Swiper(".swiper", {
        // Optional parameters
        direction: "horizontal",
        loop: true,

        slidesPerView: 1,
        spaceBetween: 20,
        // Navigation arrows
        navigation: {
            nextEl: document.documentElement.lang !== 'ar' ? ".swiper-button-next" : ".swiper-button-prev",
            prevEl: document.documentElement.lang !== 'ar' ? ".swiper-button-prev" : ".swiper-button-next",
        },

        // Responsive breakpoints
        breakpoints: {
            850: {
                slidesPerView: 2,
            },
        },
    });

    // Accordion
    let items = document.querySelectorAll(".faq-main .faq-item");
    items.forEach(function (t) {
        t.addEventListener("click", function (e) {
            items.forEach(function (e) {
                e !== t || e.classList.contains("faq-item-show")
                    ? e.classList.remove("faq-item-show")
                    : e.classList.add("faq-item-show");
            });
        });
    });

    // Splite Screen Parallax
    function splitScroll() {
        const controller = new ScrollMagic.Controller();

        new ScrollMagic.Scene({
            duration: document.documentElement.lang !== 'ar' ? "100%" : "70%",
            triggerElement: ".learn--img-wrapper",
            triggerHook: 0,
        })
            .setPin(".learn--img-wrapper")
            // .addIndicators()
            .addTo(controller);
    }

    splitScroll();
})();
