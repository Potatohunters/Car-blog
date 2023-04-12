const signinBtn = document.getElementById("signin");
const signupBtn = document.getElementById("signup");
const firstForm = document.getElementById("from1");
const secondForm = document.getElementById("from2");
const container = document.querySelector(".container");


signinBtn.addEventListener("click",()=>{
    container.classList.remove("right-panel-active")
})

signupBtn.addEventListener("click", ()=>{
    container.classList.add("right-panel-active")
})

firstForm.addEventListener("submit",(e) => e.preventDefault())


let upperCase = document.getElementById('upper')
let minLength = document.getElementById('length')
let reCheck = document.getElementById('recheck')
let numberCase = document.getElementById('number')
var pswrd = document.getElementById("pswrd");
var pswrd2 = document.getElementById("pswrd2");
var create = document.getElementById("create");

let pwd;
function checkPassword(data) {
    pwd = data;
    const upper = new RegExp('(?=.*[A-Z])')
    const length = new RegExp('(?=.{8,})')
    const number = new RegExp('(?=.*[0-9])')

    if(number.test(data)){
        numberCase.classList.add('valid')
    }else{
        numberCase.classList.remove('valid')
    }
    
    if(upper.test(data)){
        upperCase.classList.add('valid')
    }else{
        upperCase.classList.remove('valid')
    }

    if (length.test(data)) {
        minLength.classList.add('valid')
    }else{
        minLength.classList.remove('valid')
    }
    if(pswrd.value != pswrd2.value){
        reCheck.classList.remove('valid')
    }else{
        reCheck.classList.add('valid')

    }
    if(data=="" && pwd == ""){
        reCheck.classList.remove('valid')
    }
}

function recheckPassword(data){
    
    if(data===pwd){
        if(data!="" && pwd != ""){
            reCheck.classList.add('valid')
        }
    }else{
        reCheck.classList.remove('valid')
    }
}

function show(){
    numberCase.classList.remove('valid')
    upperCase.classList.remove('valid')
    reCheck.classList.remove('valid')
    minLength.classList.remove('valid')
}
function isHidden(){
    console.log(numberCase.offsetParent )
    if (numberCase.classList.contains('valid') &&
        upperCase.classList.contains('valid') &&
        reCheck.classList.contains('valid')  &&
        minLength.classList.contains('valid') )
    {

        window.location.href='Home.html'
    }

    
}

    
  //navbar
const navSlide = () =>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click',() =>{
        nav.classList.toggle('nav-active');

        navLinks.forEach((link,index) => {
           
            if (link.style.animation) {
                link.style.animation ='';
            }else{
                link.style.animation=`navLinkFade 0.5s ease forwards ${index / 7+ 0.4}s`;
            }
           
        });

        burger.classList.toggle('toggle');
    }); 
}
navSlide();

// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('theme', themeName);
    document.documentElement.className = themeName;
}

// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('theme') === 'theme-dark') {
        setTheme('theme-light');
    } else {
        setTheme('theme-dark');
    }
}

// Immediately invoked function to set the theme on initial load
(function () {
    if (localStorage.getItem('theme') === 'theme-dark') {
        setTheme('theme-dark');
        document.getElementById('slider').checked = false;
    } else {
        setTheme('theme-light');
      document.getElementById('slider').checked = true;
    }
})();


//scroll up button

let calcScrollValue = () =>{
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight-
                     document.documentElement.clientHeight;
    let scrollValue = Math.round((pos * 100) / calcHeight);
    if(pos>100){
        scrollProgress.style.display = "grid";
    }else{
        scrollProgress.style.display = "none";
    }
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(#9c9595 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};
window.onscroll = calcScrollValue;
window.onload = calcScrollValue;