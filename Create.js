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




//Create the post page
const form = document.forms['createform'];
if (form) {
    form.addEventListener('submit', beforeSubmit,false);
}


function beforeSubmit(event){
    if(form.ptitle.value==""){
        alert("Title is required.");
        document.getElementById("titleErr").innerHTML="<font color='black' size='1%'>*Please enter your post title</font>";
        event.preventDefault();
        return false; 
    }
    else if(form.tag.value==""){
        alert("tag is required.");
        document.getElementById("tagsErr").innerHTML="<font color='grey'size='1%'>*Please enter your tag</font>";
        event.preventDefault();
        return false;
        
    }
    else if(form.contentext.value==""){
        alert("content is required.");
        document.getElementById("contentErr").innerHTML="<font color='grey' size='1%'>*Please enter your content</font>";
        event.preventDefault();
        return false;
    }
    else{
        function success(homepage){
            homepage.location.href="Home.html";
            }
            success(window);
            event.preventDefault();
            alert("Successful")
    }
}

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