jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            return (
                key == 8 ||     //backspace
                key == 9 ||     //tab
                key == 13 ||    //enter
                key == 46 ||    //delete  
                (key >= 35 && key <= 40) || //home, end, all arrows
                (key >= 48 && key <= 57) || //general keys numbers 0-9
                (key >= 96 && key <= 105)); //numpad 0-9
        });
    });
};

$("#card-number").ForceNumericOnly();
$("#card-cvc").ForceNumericOnly();
$("#card-mm").ForceNumericOnly();
$("#card-yy").ForceNumericOnly();


// card Name
const cardNameInput = document.getElementById("card-name");
const cardNameOutput = document.querySelector(".cc-name-output");
// card Number
const cardNumberInput = document.getElementById("card-number");
const cardNumberOutput = document.querySelector(".cc-number-output");
// card CVC
const cardCvcInput = document.getElementById("card-cvc");
const cardCvcOutput = document.querySelector(".cc-cvc-output");
// card Year
const cardYearInput = document.getElementById("card-yy");
const cardYearOutput = document.querySelector(".cc-yy-output");
// card Month
const cardMonthInput = document.getElementById("card-mm");
const cardMonthOutput = document.querySelector(".cc-mm-output");
// card date input
const cardDateInput = document.querySelectorAll(".card-date-input");
// confirm button
const confirmButton = document.querySelector(".confirm-button");



cardNameInput.addEventListener("keyup", function(){
    
    let names=[]
    let name = this.value;
    let nameSplit = [];  
    let count = 1;

    while(name.length > 28){
        nameSplit = name.split(" ");

        if(!nameSplit[count]){
            break;
        }
        nameSplit[count] = nameSplit[count].slice(0, 1) + ".";
        name = nameSplit.join(" ");
        count++;
    }

    if(name.length <= 28 ){
        cardNameOutput.innerHTML = name;
    }
});

cardNameInput.addEventListener("focusout", function(){
    if(cardNameInput.value.length === 0) {
        cardNameOutput.innerHTML = "card owner name";
    }
   
});

cardNumberInput.addEventListener("keyup", function(){
    let cardNumber = [];
    for(let i = 0; i < 16; i++){

        if(i<cardNumberInput.value.length){
            cardNumber.push(cardNumberInput.value[i]);
        } else {
            cardNumber.push("0");
        }
    };
    cardNumber.splice(4, 0, " ");
    cardNumber.splice(9, 0, " ");
    cardNumber.splice(14, 0, " ");

    cardNumberOutput.innerHTML = cardNumber.join("");
});

cardCvcInput.addEventListener("keyup", function(){
    let cardCvc = [];
    for(let i = 0; i < 3; i++){
        if(i<cardCvcInput.value.length){
            cardCvc.push(cardCvcInput.value[i]);
        } else {
            cardCvc.push("0");
        }
    };
    cardCvcOutput.innerHTML = cardCvc.join("");
});

for(let i = 0; i<cardDateInput.length; i++){
    cardDateInput[i].addEventListener("keyup", function(){
        let cardDate = [];
        switch(this.value.length){
            case 0:
                cardDate[0] = "0";
                cardDate[1] = "0";
                break;
            case 1:
                cardDate[0] = "0";
                cardDate[1] = this.value;
                break;
            case 2:
                cardDate[0] = this.value[0];
                cardDate[1] = this.value[1];
                break;
            default:
                break;
        }
        switch(this.id){
            case "card-yy":
                cardYearOutput.innerHTML = cardDate.join(""); 
                break;
            case "card-mm":
                cardMonthOutput.innerHTML = cardDate.join(""); 
                break;
            default:
                break;
        }
    });
}

cardYearInput.addEventListener("keyup", function(e){
    var key = e.charCode || e.keyCode || 0;
        if(key == 8 && cardYearInput.value.length == 0){
            cardMonthInput.focus();
    } 
});
cardMonthInput.addEventListener("keyup", function(e){
    if(cardMonthInput.value.length == 2){
        cardYearInput.focus();
    }
});


confirmButton.addEventListener("click", function(){
    let flag = 0;

    // name input check

    if(cardNameInput.value.length === 0){
        cardNameInput.classList.add("wrong-input");
        document.getElementById("wrong-name").innerHTML = "Can't be blank";
        document.getElementById("wrong-name").classList.remove("hide");
        flag = 1;
    } else if(!/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ\s]+$/.test(cardNameInput.value)){
        cardNameInput.classList.add("wrong-input");
        document.getElementById("wrong-name").innerHTML = "Can't contain special characters";
        document.getElementById("wrong-name").classList.remove("hide");
        flag = 1;
    } else {
        cardNameInput.classList.remove("wrong-input");
        document.getElementById("wrong-name").classList.add("hide");
    }

    // number input check

    if(cardNumberInput.value.length === 0){
        cardNumberInput.classList.add("wrong-input");
        document.getElementById("wrong-number").innerHTML = "Can't be blank";
        document.getElementById("wrong-number").classList.remove("hide");
        flag = 1;
    } else if(!/^[0-9]+$/.test(cardNumberInput.value)){
        cardNumberInput.classList.add("wrong-input");
        document.getElementById("wrong-number").innerHTML = "Only numbers allowed";
        document.getElementById("wrong-number").classList.remove("hide");
        flag = 1;
    } else if(cardNumberInput.value.length !== 16){
        cardNumberInput.classList.add("wrong-input");
        document.getElementById("wrong-number").innerHTML = "Need to be 16 digits";
        document.getElementById("wrong-number").classList.remove("hide");
        flag = 1;
    } else {
        cardNumberInput.classList.remove("wrong-input");
        document.getElementById("wrong-number").classList.add("hide");
    }

    // month input check

    if(cardMonthInput.value.length === 0){
        cardMonthInput.classList.add("wrong-input");
        document.getElementById("wrong-month").innerHTML = "Can't be blank";
        document.getElementById("wrong-month").classList.remove("hide");
        flag = 1;

    } else if(!/^[0-9]+$/.test(cardMonthInput.value)) {
        cardMonthInput.classList.add("wrong-input");
        document.getElementById("wrong-month").innerHTML = "Only numbers";
        document.getElementById("wrong-month").classList.remove("hide");
        flag = 1;
    } else if(parseInt(cardMonthInput.value, 10) > 12 || parseInt(cardMonthInput.value, 10) <= 0 ){
        cardMonthInput.classList.add("wrong-input");
        document.getElementById("wrong-month").innerHTML = "Invalid Month";
        document.getElementById("wrong-month").classList.remove("hide");
        flag = 1;
    } else if(cardMonthInput.value.length !== 2){
        cardMonthInput.classList.add("wrong-input");
        document.getElementById("wrong-month").innerHTML = "At least 2 digits";
        document.getElementById("wrong-month").classList.remove("hide");
        flag = 1;
    } else {
        cardMonthInput.classList.remove("wrong-input");
        document.getElementById("wrong-month").classList.add("hide");
    }

    // year input check
    if(cardYearInput.value.length === 0){
        cardYearInput.classList.add("wrong-input");
        document.getElementById("wrong-year").innerHTML = "Can't be blank";
        document.getElementById("wrong-year").classList.remove("hide");
        flag = 1;
    } else if(!/^[0-9]+$/.test(cardYearInput.value)) {
        cardYearInput.classList.add("wrong-input");
        document.getElementById("wrong-year").innerHTML = "Only numbers";
        document.getElementById("wrong-year").classList.remove("hide");
        flag = 1;
    } else if(cardYearInput.value.length !== 2){
        cardYearInput.classList.add("wrong-input");
        document.getElementById("wrong-year").innerHTML = "At least 2 digits";
        document.getElementById("wrong-year").classList.remove("hide");
        flag = 1;
    } else {
        cardYearInput.classList.remove("wrong-input");
        document.getElementById("wrong-year").classList.add("hide");
    }

    // CVC input check
    if(cardCvcInput.value.length === 0){
        cardCvcInput.classList.add("wrong-input");
        document.getElementById("wrong-cvc").innerHTML = "Can't be blank";
        document.getElementById("wrong-cvc").classList.remove("hide");
        flag = 1;
    } else if(!/^[0-9]+$/.test(cardCvcInput.value)) {
        cardCvcInput.classList.add("wrong-input");
        document.getElementById("wrong-cvc").innerHTML = "Only numbers allowed";
        document.getElementById("wrong-cvc").classList.remove("hide");
        flag = 1;
    } else if(cardCvcInput.value.length !== 3){
        cardCvcInput.classList.add("wrong-input");
        document.getElementById("wrong-cvc").innerHTML = "At least 3 digits";
        document.getElementById("wrong-cvc").classList.remove("hide");
        flag = 1;
    } else {
        cardCvcInput.classList.remove("wrong-input");
        document.getElementById("wrong-cvc").classList.add("hide");
    }

    // any error check
    if(flag === 0){
        document.querySelector(".main-container").classList.add("hide");
        document.querySelector(".submit-success-container").classList.remove("hide"); 
    }
})

document.querySelector(".continue-button").addEventListener("click", function(){
    document.querySelector(".main-container").classList.remove("hide");
    document.querySelector(".submit-success-container").classList.add("hide");
})
