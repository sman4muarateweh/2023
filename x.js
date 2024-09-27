document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById("popup");
    const continueButton = document.getElementById("continueButton");

    setTimeout(() => {
        popup.classList.add("show");
    }, 100); 

    continueButton.addEventListener("click", function() {
        popup.classList.add("fade-out"); 
        setTimeout(function() {
            window.location.href = "p/";
        }, 500);
    });
});
