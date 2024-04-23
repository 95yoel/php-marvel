//Class to handle the img perspective effect
class MouseHoverImg{
    constructor(element,sensitivity){
        this.element = element;
        this.sensitivity = sensitivity;
        this.centerX = window.innerWidth/2;
        this.centerY = window.innerHeight/2;

        // Call the updateTransformation function on every mouse move
        document.addEventListener("mousemove",(e)=>{
            this.updateTransformation(e.clientX,e.clientY);
        });
    }

    updateTransformation(mouseX,mouseY){
        const deltaX = mouseX - this.centerX;
        const deltaY = mouseY - this.centerY;
        const rotateY = -deltaX * this.sensitivity;
        const rotateX = deltaY * this.sensitivity;

        //Apply the CSS
        this.element.style.transform = `perspective(500px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
    };
}