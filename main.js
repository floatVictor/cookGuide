console.log('bite')

let form = document.querySelector('.ingredients')

document.querySelector('.add').addEventListener('click',() => {
    let ingredientInput = document.createElement('input')
    ingredientInput.type = 'text'
    ingredientInput.name = 'ingredient[]'
    ingredientInput.placeholder = 'ingrédient'

    let quantiteeInput = document.createElement('input')
    quantiteeInput.type = 'text'
    quantiteeInput.name = 'quantitee[]'
    quantiteeInput.placeholder = 'quantitée (g)'

    let inputsContainer = document.createElement('div')
    inputsContainer.appendChild(ingredientInput)
    inputsContainer.appendChild(quantiteeInput)


    form.appendChild(inputsContainer)
})

