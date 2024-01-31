// =================================================================================
// Header menu
// =================================================================================
const btnCloseSideMenu = document.getElementById("closeSideMenu");
const btnMenu = document.getElementById("btnMenu");
const sideMenu = document.querySelector(".header__nav-wrapper");


function openSideMenu(){
    sideMenu.classList.add('active');
}

function closeSideMenu(){
    sideMenu.classList.remove('active');
}

btnMenu.addEventListener('click', openSideMenu);
btnCloseSideMenu.addEventListener('click', closeSideMenu);

function sideMenuClose(event){
    if(sideMenu.classList.contains("active") && !event.target.closest('.header__nav-wrapper') && !event.target.closest('.btn-menu')){
        closeSideMenu();
    }
}

document.addEventListener('click', sideMenuClose)

