function convertToUppercase(inputField) {
    inputField.value = inputField.value.toUpperCase(); // Use inputField instead of input
}
function validatePhoneNum(phoneNumber){
    const regex = /^\d{10}$/;
    return regex.test(phoneNumber);
}
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }

function phoneRemoveText(){
    document.getElementById('phone-helper-text').innerHTML="";
console.log('phoneRemoveText');
}  
function emailRemoveText(){
    document.getElementById('email-helper-text').innerHTML="";
console.log('emailRemoveText');
}  

function submitForm(){
    const phoneNumber = document.getElementById('phonenum').value;
        console.log(phoneNumber);

    const isvalid = validatePhoneNum(phoneNumber);
    console.log(isvalid);
    if(isvalid){
        console.log('valid phone number');
    }
    else{
        console.log('invalid phone number');
        document.getElementById('phone-helper-text').innerHTML="Invalid phone number";
    }

    const email1 =  document.getElementById('emailid').value;
    console.log(email1);
    console.log(isvalid);
    const isvalid1 = validateEmail(email1);
    if(isvalid1){
        console.log('valid email id');
    }
    else{
        console.log('invalid email id');
        document.getElementById('email-helper-text').innerHTML="Invalid email id";
    }

    
}