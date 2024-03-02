export const footer = (ScrollTrigger) => {
    ScrollTrigger.create({
        trigger: ".footer",
        pin: true,
        markers: true,
        start: "bottom bottom",
        end: "+=100%",
    });
};
