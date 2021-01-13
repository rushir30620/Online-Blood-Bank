console.log("hello");
const name = document.getElementById('name');
const email = document.getElementById('Email');
const mobile = document.getElementById('mobile');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');
const dob = document.getElementById('dob');

dob.addEventListener('blur',()=>{
    let str= dob.value.split("-");
    let year=parseInt(str[0]);
    let month=parseInt(str[1]);
    let day=parseInt(str[2]);
    let current=new Date();
    let b=new Date(year,month-1,day);
    let age=current.getTime()-b.getTime();
    year=1000*60*60*24*365; //1 year
    age=Math.round(age/year);
    if(age>=18){
        dob.classList.remove('is-invalid');
    }
    else{
        dob.classList.add('is-invalid');
    }
    
})

name.addEventListener('blur', ()=>{
    let regex = /^([a-zA-Z]){1,30}$/;
    let str = name.value;
    if(regex.test(str)){
        name.classList.remove('is-invalid');
    }
    else{
        name.classList.add('is-invalid'); 
    }
})

email.addEventListener('blur', ()=>{
    let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    let str = email.value;
    if(regex.test(str)){
        email.classList.remove('is-invalid');
    }
    else{
        email.classList.add('is-invalid');
    }
})

mobile.addEventListener('blur', ()=>{

    let regex = /^([0-9]){10}$/;
    let str = mobile.value;
    if(regex.test(str)){
        mobile.classList.remove('is-invalid');
    }
    else{
        mobile.classList.add('is-invalid');
    }
})

password.addEventListener('blur', ()=>{
    let regex=/^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    let str =  password.value;
    if (regex.test(str)) {
        password.classList.remove('is-invalid');
    }
    else{
        password.classList.add('is-invalid');
    }
});

cpassword.addEventListener('blur', ()=>{
    let regex=/^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    let str =  cpassword.value;
    if (regex.test(str) && cpassword.value == password.value) {
        cpassword.classList.remove('is-invalid');
    }
    else{
        cpassword.classList.add('is-invalid');
    }
});

let signup=document.getElementById('signup');
signup.addEventListener('click',(e)=>{
    let invalid=document.getElementsByClassName('is-invalid');
    console.log(invalid);
    if(invalid.length > 0){
        e.preventDefault();
        console.log("you can not submit");
    }
});



