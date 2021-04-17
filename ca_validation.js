//import _variables from 'css/_variables.scss';

const { func } = require("prop-types");

function custid_validation()
{
    'use strict';
    var custid_format = /^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$/;
    var custid_name = document.getElementById("customerID");
    var custid_value = document.getElementById("customerID").value;
    console.log(custid_value);
    var custid_length = custid_value.length;
    if (custid_length < 10 || custid_length > 60) {
        document.getElementById('custid_message').innerHTML = 'Customer ID must not be less than 10 characters or greater than 60 characters';
        custid_name.focus();
        document.getElementById('custid_message').style.color = "#FF0000";
    }
    if (!custid_value.match(custid_format)) {
        document.getElementById('custid_message').innerHTML = 'Invalid email format. Example = hello123@email.com';
        custid_name.focus();
        document.getElementById('custid_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('custid_message').innerHTML = '&#10003';
        document.getElementById('custid_message').style.color = "#00AF33";
    }
}

function name_validation() {
    'use strict';
    var custName_name = document.getElementById("name");
    var custName_value = document.getElementById("name").value;
    console.log(custName_value);
    var custName_length = custName_value.length;
    if (custName_length < 7 || custName_length > 30) {
        document.getElementById('name_message').innerHTML = 'Name must not be less than 7 characters or greater than 30 characters';
        custName_name.focus();
        document.getElementById('name_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('name_message').innerHTML = '&#10003';
        document.getElementById('name_message').style.color = "#00AF33";
    }
}

function username_validation(){
    'use strict';
    var username = document.getElementById("username");
    var username_value = document.getElementById("username").value;
    console.log(username_value);
    var username_length = username_value.length;
    if (username_length < 7 || username_length > 30) {
        document.getElementById('username_message').innerHTML = 'Username must not be less than 7 characters or greater than 30 characters';
        username_name.focus();
        document.getElementById('username_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('username_message').innerHTML = '&#10003';
        document.getElementById('username_message').style.color = "#00AF33";
    }
}

function password_validation(){
    'use strict';
    var password = document.getElementById("password");
    var password_format = /\^[a-zA-Z0-9]\{8\,}\$/;
    var password_value = document.getElementById("password").value;
    var password_length = password_value.length;
    if (password_length < 8 || username_length > 15) {
        document.getElementById('password_message').innerHTML = 'Password must not be less than 8 characters or greater than 15 characters';
        password_name.focus();
        document.getElementById('password_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('password_message').innerHTML = '&#10003';
        document.getElementById('password_message').style.color = "#00AF33";
    }
    /*if (!password_value.match(password_format)) {
        document.getElementById('password_message').innerHTML = 'Password must contain uppercase, lowercase and a number.';
        password.focus();
        document.getElementById('password_message').style.color = "#FF0000";
    }*/
}

function address_validation()
{
    'use strict';
    //var address_format = /\^[a-zA-Z0-9-\s,]\{0\,50\}\$/;
    var address = document.getElementById("address");
    var address_value = document.getElementById("address").value;
    console.log(address_value);
    var address_length = address_value.length;
    console.log(address_length);
    if (address_length < 10) {
        document.getElementById('address_message').innerHTML = 'Address cannot be less than 10 characters or greater than 50 characters';
        address.focus();
        document.getElementById('address_message').style.color = "#FF0000";
    }
    /*if (!address_value.match(address_format)) {
        document.getElementById('address_message').innerHTML = 'Invalid address. Include house number and street address.';
        address.focus();
        document.getElementById('address_message').style.color = "#FF0000";
    }*/
    else {
        document.getElementById('address_message').innerHTML = '&#10003';
        document.getElementById('address_message').style.color = "#00AF33";
    }
}

function mobileNum_valdation() 
{
    'use strict';
    //var mobile_format = /\^[0][8][3,5-9][0-9]\{7\}\$/;
    var mobile_format = /^[0][8][3,5-9][0-9]{7}$/;
    var mobile_num = document.getElementById("mobile");
    var mobile_value = document.getElementById("mobile").value;
    console.log(mobile_value);
    var mobile_length = mobile_value.length;
    if (mobile_length < 10) {
        document.getElementById('mobile_message').innerHTML = 'Mobile number must not be less than 10 characters. ';
        mobile_num.focus();
        document.getElementById('mobile_message').style.color = "#FF0000";
    }
    if (!mobile_value.match(mobile_format)) {
        document.getElementById('mobile_message').innerHTML = 'Invalid mobile format. Example = 08XXXXXXXX';
        mobile_num.focus();
        document.getElementById('mobile_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('mobile_message').innerHTML = '&#10003';
        document.getElementById('mobile_message').style.color = "#00AF33";
    }

}

function number_valdation() 
{
    'use strict';
    var number_format = /^[0-9]{5}$/;
    var number = document.getElementById("num");
    var number_value = document.getElementById("num").value;
    console.log(number_length);
    var number_length = number_value.length;
    if (number_length < 0) {
        document.getElementById('num_message').innerHTML = 'Stock must be greater than -1';
        number.focus();
        document.getElementById('num_message').style.color = "#FF0000";
    }
    if (!number_value.match(number_format)) {
        document.getElementById('num_message').innerHTML = 'Invalid stock. Must be a number.';
        number.focus();
        document.getElementById('num_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('num_message').innerHTML = '&#10003';
        document.getElementById('num_message').style.color = "#00AF33";
    }

}

function price_valdation() 
{
    'use strict';
    var price_format = /[0-9]*[.]?[0-9]+/;
    var price = document.getElementById("price");
    var price_value = document.getElementById("price").value;
    var price_length = price_value.length;
    if (price_length < 0) {
        document.getElementById('price_message').innerHTML = 'Price must be greater than 0';
        price.focus();
        document.getElementById('price_message').style.color = "#FF0000";
    }
    if (!price_value.match(price_format)) {
        document.getElementById('price_message').innerHTML = 'Invalid price. Example: XX.XX .';
        price.focus();
        document.getElementById('price_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('price_message').innerHTML = '&#10003';
        document.getElementById('price_message').style.color = "#00AF33";
    }

}

function addCat_validation() 
{
    'use strict';
    var cat_format = /^[a-zA-Z-\s\&]{0,15}$/;
    var category_name = document.getElementById("category");
    var category_value = document.getElementById("category").value;
    var category_length = category_value.length;
    if (!category_value.match(cat_format)) {
        document.getElementById('cat_message').innerHTML = 'Invalid category. Letters only.';
        category_name.focus();
        document.getElementById('cat_message').style.color = "#FF0000";
    }
    else if (category_length > 15) {
        document.getElementById('cat_message').innerHTML = 'Category must not be greater than 15 characters';
        category_name.focus();
        document.getElementById('cat_message').style.color = "#FF0000";
    }
    else {
        document.getElementById('cat_message').innerHTML = '&#10003';
        document.getElementById('cat_message').style.color = "#00AF33";
    }
}
