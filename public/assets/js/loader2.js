let buttonLoader2 = document.getElementById('submit-and-load2')

window.addEventListener('load', ()=> {
    let loaderContainer2 = document.getElementById('loader-container2')

    console.log(loaderContainer2)

    buttonLoader2.addEventListener('click', ()=> {
    loaderContainer2.style.display = 'block'
})
})





