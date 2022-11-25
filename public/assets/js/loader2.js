let buttonLoader2 = document.querySelectorAll('#submit-and-load2')

window.addEventListener('load', ()=> {
    let loaderContainer2 = document.getElementById('loader-container2')

    console.log(loaderContainer2)

    buttonLoader2.forEach( button => {
        button.addEventListener('click', ()=> {
            loaderContainer2.style.display = 'block'
        })
    })
})





