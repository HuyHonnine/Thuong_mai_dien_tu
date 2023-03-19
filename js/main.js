let containerRecommend = document.querySelector('.container_recommend');
 
document.querySelector('.input_search').onclick = () =>{
    containerRecommend.classList.toggle('active');
}

let loginForm = document.querySelector('.login-form');
 
document.querySelector('.profile_user').onclick = () =>{
    loginForm.classList.toggle('active');
    ketQua.classList.remove('active');
    spCanhan.classList.remove('active');
    thuVien.classList.remove('active');
}