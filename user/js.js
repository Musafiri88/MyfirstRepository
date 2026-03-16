let show_menu = document.querySelector('.menu_icon');
let menu_list = document.querySelector('.menu_list');

// let parametres = document.querySelector('.parametre_title_icon');
// let parametre_list = document.querySelector('.parametre_lists');


// show_menu.addEventListener('click',add);

// function add(){
//     menu_list.classList.toggle('show_menu_list');
// }

// parametres.addEventListener('click',add_all);


// function add_all(){
//     parametre_list.style.display = 'block';
// }

show_menu.addEventListener('click', (event) => {
    menu_list.classList.toggle('show_menu_list');
    event.stopPropagation();
});

window.addEventListener('click', (event) => {
    if (!menu_list.contains(event.target) && event.target !== show_menu) {        
        menu_list.classList.remove('show_menu_list');
    }
});

// parametres.addEventListener('click', (event) => {
//     parametre_list.classList.toggle('show_parametre_list');
//     event.stopPropagation();
// }); 



console.log("hello");


const navlinks = [...document.querySelectorAll('.menu_list_hover')];
navlinks.forEach(link => {
    link.addEventListener('click', function (event) {
        navlinks.forEach(navlink => navlink.classList.remove('active'));
        link.classList.add('active');
    })
 });

 console.log("hello");