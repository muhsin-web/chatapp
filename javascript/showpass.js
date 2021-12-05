const pwdField = document.querySelector(".form input[type=password]"),
toggleBtn = document.querySelector(".toggle");
console.log("heloooo");

toggleBtn.addEventListener('click',  function(){
console.log("hiiiiiiiiii");
    if(pwdField.type == "password"){
        pwdField.type = "text";
        toggleBtn.classList.add('active');
}else{
    pwdField.type = "password";
    toggleBtn.classList.remove('active');
}
});
console.log(toggleBtn);
console.log(pwdField);