const open = document.querySelector('.burger');
const close = document.querySelector('.close');
const nav = document.querySelector('.nav');
const wrapper = document.querySelector('.wrapper');

nav.remove()

open.addEventListener("click", () => {
    wrapper.append(nav)
    gsap.to(".burger", {
        opacity: 0,
        duration: 0.1
    })
    gsap.to(".nav", {
        x: 0,
    })
    gsap.to(".table-wrapper", {
        x: 100,
    }) 
    gsap.to('.close', {
        x: 250,
        opacity: 1
    })
});
close.addEventListener("click", () => {
    gsap.to(".burger", {
        opacity: 1,
        delay: 0.3
    })
    gsap.to(".nav", {
        x: -320,
    })
    gsap.to(".table-wrapper", {
        x: 0,
    })
    gsap.to('.close', {
        x: -100,
        opacity: 0
    })
});