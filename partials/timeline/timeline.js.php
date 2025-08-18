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
