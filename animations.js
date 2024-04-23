// Execute when all the DOM is loaded
document.addEventListener("DOMContentLoaded", function() {
    
    var poster = document.getElementById('poster');
    var countdown = document.getElementById('countdown');
    // Animate with gsap
    gsap.from(poster, {
        duration: 1.5, 
        y: "-100%", 
        ease: "elastic.out(1, 1)", // bounce effect
    });

    gsap.from(countdown,{
        duration:2,
        x:"-100%",
        ease: "elastic.out(1, 1)", // bounce effect
    });

});