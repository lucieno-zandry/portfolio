gsap
  .timeline({
    scrollTrigger: {
      trigger: ".grid-container",
      start: "top top",
      scrub: true,
      pin: ".grid",
      markers: false,
    },
  })
  .set(".gridBlock:not(.centerBlock)", { autoAlpha: 0})
  .to(".gridBlock:not(.centerBlock)", { duration: 0.1, autoAlpha: 1 }, 0.001)
  .from(".gridLayer", {
    scale: 3.3333,
    ease: "none",
  });

// Images to make it look better, not related to the effect
const size = Math.max(innerWidth, innerHeight);
gsap.set(".gridBlock", {
  backgroundImage: (i) => `url(../../assets/techs/tech-${i}.webp)`,
});

const bigImg = new Image();
bigImg.addEventListener("load", function () {
  gsap.to(".centerPiece .gridBlock", { autoAlpha: 1, duration: 0.5 });
});

bigImg.src = `../../assets/techs/tech-1.webp`;
