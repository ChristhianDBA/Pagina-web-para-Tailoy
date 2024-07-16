/*BOTONCITO DE SUBIDA Y BAJADA*/
document.addEventListener('DOMContentLoaded', function() {
    const inputQuantity = document.querySelector('.input-quantity');
    const btnIncrement = document.getElementById('increment');
    const btnDecrement = document.getElementById('decrement');

    btnIncrement.addEventListener('click', function() {
        inputQuantity.stepUp();
    });

    btnDecrement.addEventListener('click', function() {
        inputQuantity.stepDown();
    });
});

/*DESPLIEGUES*/
document.addEventListener('DOMContentLoaded', function() {
    const toggleDescription = document.querySelector('.tittle-description');
    const toggleAdditionalInformation = document.querySelector('.tittle-additional-information');
    const toggleReviews = document.querySelector('.tittle-reviews');

    toggleDescription.addEventListener('click', function() {
        document.querySelector('.text-description').classList.toggle('hidden');
    });

    toggleAdditionalInformation.addEventListener('click', function() {
        document.querySelector('.text-additional-information').classList.toggle('hidden');
    });
});
