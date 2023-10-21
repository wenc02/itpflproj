const buttsignup = document.querySelector('.signup button');
const buttlogin = document.querySelector('.login button');  
const wrapper = document.querySelector('.wrapper');

buttsignup.addEventListener('click', () => {
    wrapper.classList.add('wrapper2')
            
});
buttlogin.addEventListener('click', () => {
    wrapper.classList.remove('wrapper2')
});