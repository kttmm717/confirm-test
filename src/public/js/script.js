const openModalButtons = document.querySelectorAll('.open');
const closeModalButtons = document.querySelectorAll('.close');
const modals = document.querySelectorAll('.modal');

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if(modal) {
            modal.style.display = 'block';
        }
    });
});
closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal');
        if(modal) {
            modal.style.display = 'none';
        }
    })
})