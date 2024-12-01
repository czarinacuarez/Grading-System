const userInput = document.querySelector('.js-username input'),
passInput = document.querySelector('.js-password input'), firstInput = document.querySelector('.js-firstname input'),
lastInput = document.querySelector('.js-lastname input'), emailInput = document.querySelector('.js-email input')


userInput.addEventListener('focus', () => {
    focusState(userInput)
})

userInput.addEventListener('blur', () => {
    blurState(userInput)
})

firstInput.addEventListener('focus', () => {
    focusState(firstInput)
})

firstInput.addEventListener('blur', () => {
    blurState(firstInput)
})

lastInput.addEventListener('focus', () => {
    focusState(lastInput)
})

lastInput.addEventListener('blur', () => {
    blurState(lastInput)
})

emailInput.addEventListener('focus', () => {
    focusState(emailInput)
})

emailInput.addEventListener('blur', () => {
    blurState(emailInput)
})



passInput.addEventListener('focus', () => {
    focusState(passInput)
})

passInput.addEventListener('blur', () => {
    blurState(passInput)

})


function focusState(element){
        parentEl = element.parentElement
            parentEl.classList.add('active')             

        
}

function blurState(element){
    parentEl = element.parentElement
    if(!element.value){
        parentEl.classList.remove('active')  
    }
}

window.addEventListener('pageshow', () => {
    if(userInput && userInput.value){
        focusState(userInput)
    }
})



