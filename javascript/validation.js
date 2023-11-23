document.querySelector('.btn').onclick = function(){
    
    var password = document.getElementById('password').value,
            confirmPassword = document.getElementById('confirmPass').value;
            
            if (password !== confirmPassword){
                alert("Password not matched, try again");
            }
    
};