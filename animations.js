document.addEventListener("DOMContentLoaded", function() {
    
    var poster = document.getElementById('poster');

    // Animate with gsap
    gsap.from(poster, {
        duration: 1.5, 
        y: "-100%", 
        ease: "elastic.out(1, 1)", // bounce effect
    });
});