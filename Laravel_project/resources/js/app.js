import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// modale 

// recuperiamo i bottoni del form
const deleteForms = document.querySelectorAll('.form-delete');
// recuperiamo la modale di bootstrap 
const deleteModal = new bootstrap.Modal('#modalDelete');
// recuperiamo il bottone della modale 
const btnModalDelete = document.querySelector('#button-modal-delete');
// console.log(btnModalDelete)

// recuperiamo il testo della modale 
const textModal = document.querySelector('.text-modal');

// dai form prendiamo l evento 
deleteForms.forEach((deleteForm) => {
    // recuperiamo il bottone dalla card 
    const deleteFormBtn = deleteForm.querySelector('.form-delete-btn');
    // recuperiamo il titolo tramite il data attribute 
    let productName = deleteForm.dataset.deleteName + '?';
//    console.log(deleteForm.dataset.deleteName);
    // a questo bottone precedente recuperato aggiungiamo un evento click 
    deleteFormBtn.addEventListener('click', (ev) => {
        // a questo evento preveniamo i comportamenti di default 
        ev.preventDefault();
        // aggiungiamo al testo della modale il titolo 
        textModal.innerHTML += productName;
    
        deleteModal.show(); // Mostra la modale
        // pulisco la variabile product name 
        productName = '';
        
        // quando il bottone viene clickato nella modale eseguiamo il submit e quindi cancelliamo il fumetto
        btnModalDelete.addEventListener('click',() =>{

            deleteForm.submit(); // Esegue la submit della form che ha aperto la modale
        })

    });
});


