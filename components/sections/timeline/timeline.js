gsap.registerPlugin(MotionPathPlugin);
gsap.defaults({ ease: "none" });

const pulses = gsap
    .timeline({
        defaults: {
            duration: 0.05,
            autoAlpha: 1,
            scale: 2,
            transformOrigin: "center",
            ease: "elastic(2.5, 1)",
        },
    })
    .to(".ball01, .text00, .title-0", {}, 0.05)
    .to(".ball02, .text01, .title-1", {}, 0.2)
    .to(".ball03, .text02, .title-2", {}, 0.33)
    .to(".ball04, .text03, .title-3", {}, 0.46)
    .to(".ball05, .text04, .title-4", {}, 0.59)
    .to(".ball06, .text05, .title-5", {}, 0.72);

const main = gsap
    .timeline({
        defaults: { duration: 1 },
        scrollTrigger: {
            trigger: "#svg-stage",
            scrub: true,
            start: "top center",
            end: "bottom center",
            markers: false,
        },
    })
    .to(".ball00", { duration: 0.01, autoAlpha: 1 })
    // .from(".theLine", {drawSVG: 0}, 0)
    .to(
        ".ball00",
        {
            motionPath: {
                path: ".theLine",
                align: ".theLine",
                alignOrigin: [0.5, 0.5],
            },
        },
        0
    )
    .add(pulses, 0);

/* ------------------------------------------------------------------ */
/* Info popovers — fill in `info` and `url` for each establishment.    */
/* Order matches text00 → text05 (data-index 0-5) in timeline.php.     */
/* ------------------------------------------------------------------ */
const companyInfo = [
    {
        name: "Group VII Origin",
        info: "A french company specialized in application development based in Paris, France.",
        url: "https://groupviiorigin.com/",
    },
    {
        name: "Zafy Tody",
        info: "This company helps accelerate the startup ecosystem in Madagascar.",
        url: "https://zafytody.mg/en/",
    },
    {
        name: "Maboo",
        info: "An e-commerce based company that targets young mothers.",
        url: "https://maboo.mg",
    },
    {
        name: "Teko Consulting",
        info: "A Software engineering services firm based in Madagascar.",
        url: "https://www.linkedin.com/in/teko-consulting-03140a1b9?originalSubdomain=mg",
    },
    {
        name: "IT University & Université Hay",
        info: "IT University is ranked first as the best software college in Madagascar",
        url: "https://www.ituniversity-mg.com",
    },
    {
        name: "La Pepite d'Or",
        info: "A very well known highschool in the capital of Antananarivo.",
        url: "https://www.facebook.com/lapepitedorantaninandro/",
    },
];

// Precisely places each info icon right after its company-name text,
// using the text's real rendered bounding box (works for both
// left-aligned and right-aligned entries).
function positionInfoIcons() {
    document.querySelectorAll(".company-name").forEach((el, i) => {
        const icon = document.querySelector(`.info-icon[data-index="${i}"]`);
        if (!icon) return;
        const bbox = el.getBBox();
        const x = bbox.x + bbox.width + 14;
        const y = bbox.y + bbox.height / 2;
        // icon.setAttribute("transform", `translate(${x}, ${y})`);
    });
}

function initInfoPopovers() {
    const container = document.querySelector(".timeline-container");
    const popover = document.getElementById("infoPopover");
    if (!container || !popover) return;

    const title = popover.querySelector(".info-popover-title");
    const text = popover.querySelector(".info-popover-text");
    const link = popover.querySelector(".info-popover-link");
    const closeBtn = popover.querySelector(".info-popover-close");

    let activeIcon = null;

    function openPopover(icon) {
        const data = companyInfo[Number(icon.dataset.index)];
        if (!data) return;

        title.textContent = data.name;
        text.textContent = data.info;
        link.href = data.url;

        const iconRect = icon.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        popover.style.top = `${iconRect.top - containerRect.top + iconRect.height / 2}px`;
        popover.style.left = `${iconRect.left - containerRect.left + iconRect.width / 2}px`;

        const overflowsRight = iconRect.left + 260 > window.innerWidth;
        popover.classList.toggle("align-left", overflowsRight);

        popover.classList.add("is-open");
        popover.setAttribute("aria-hidden", "false");
        activeIcon = icon;
    }

    function closePopover() {
        popover.classList.remove("is-open");
        popover.setAttribute("aria-hidden", "true");
        activeIcon = null;
    }

    document.querySelectorAll(".info-icon").forEach((icon) => {
        icon.addEventListener("click", (e) => {
            e.stopPropagation();
            activeIcon === icon ? closePopover() : openPopover(icon);
        });
        icon.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                activeIcon === icon ? closePopover() : openPopover(icon);
            }
        });
    });

    closeBtn.addEventListener("click", closePopover);
    document.addEventListener("click", (e) => {
        if (activeIcon && !popover.contains(e.target)) closePopover();
    });
    window.addEventListener("scroll", closePopover, { passive: true });
    window.addEventListener("resize", () => {
        // positionInfoIcons();
        closePopover();
    });
}

window.addEventListener("load", () => {
    // positionInfoIcons();
    initInfoPopovers();
});