window.addEventListener('DOMContentLoaded', function() {
    const flashMessage = document.getElementById('flash');

    if(flashMessage) {
        flashMessage.addEventListener('click', function() {
            flashMessage.style.display = 'none';
            document.getElementsByClassName('has-flash')[0].classList.remove('has-flash');
        });
    }
});