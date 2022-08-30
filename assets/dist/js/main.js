$(document).ready(function(){


    
    //REGISTRATION
    $(document).on("click","#btnReg", function(){
        let firstName = $("#tbFirstName")
        let lastName = $("#tbLastName")
        let email = $("#tbEmail")
        let username = $("#tbUsername")
        let password = $("#tbPassword")
        let passwordC = $("#tbPasswordC")
        let phone = $("#tbPhone")

        let country = $("#ddlCountries")
        let city = $("#tbCity")
        let zipCode = $("#tbZipCode")
        let streetName = $("#tbStreetName")
        let streetNumber = $("#tbStreetNumber")

        let regexName = /^[a-z ,.'-]+$/i;
        let regexUsername = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
        let regexEmail =/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/
        let regexPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        let regexCity = /^[a-zA-Z',.\s+]{1,25}$/
        let regexZipCode = /(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/
        let regexStreetName = /^[a-z ,.'-]+$/i;
        let regexStreetNumber = /(\b.*\d+.*?\b)/
        let regexPhone = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{3,4}$/

        let errors = []
         
        if(!regexName.test(firstName.val())){
            errors.push("Wrong first name entered.")
            
            firstName.addClass("error")
            $("#errorFName").css("display","block")
        }else{
            firstName.removeClass("error")
            $("#errorFName").css("display","none")
        }
        
        if(!regexName.test(lastName.val())){
            errors.push("Wrong last name entered.")
            lastName.addClass("error")
            $("#errorLName").css("display","block")
        }else{
            lastName.removeClass("error")
            $("#errorLName").css("display","none")
        }

        if(!regexPhone.test(phone.val())){
            errors.push("Wrong phone entered.")
            phone.addClass("error")
            $("#errorPhone").css("display","block")
        }else{
            phone.removeClass("error")
            $("#errorPhone").css("display","none")
        }


        if(!regexUsername.test(username.val())){
            errors.push("Wrong username entered.")
            username.addClass("error")
            $("#errorUser").css("display","block")
            console.log(username.val())
        }else{
            username.removeClass("error")
            $("#errorUser").css("display","none")
        }
        if(!regexEmail.test(email.val())){
            errors.push("Wrong email entered.")
            email.addClass("error")
            $("#errorEmail").css("display","block")
        }else{
            email.removeClass("error")
            $("#errorEmail").css("display","none")
        }
        if(regexPass.test(password.val())){
            password.removeClass("error")
            $("#errorPass").css("display","none")
        
            if(passwordC.val() != password.val()){
                errors.push("Passwords do not match.")
                passwordC.addClass("error")
                $("#errorPassC").css("display","block")
                
            }else{
                $("#errorPassC").css("display","none")
                passwordC.removeClass("error")
            }
        }else{
            errors.push("Wrong password entered.")
            password.addClass("error")
            $("#errorPass").css("display","block")
            
        }


        let enterAddress = 0;
         if(country.val() != 0){
            enterAddress++ 
            country.removeClass("error")
            $("#errorCountry").css("display","none")
        } else{
            country.addClass("error")
            $("#errorCountry").css("display","block")
        }
        if(city.val() != ""){
            enterAddress++
           
        }
        if(zipCode.val() != ""){
            enterAddress++
            
        }
        if(streetName.val() != ""){
            enterAddress++
            
        }
        if(streetNumber.val() != ""){
            enterAddress++
            
        }

        

        
        if(enterAddress == 5 || enterAddress == 0){
            $("#answer").css("display","none")
            country.removeClass("error")
            city.removeClass("error")
            zipCode.removeClass("error")
            streetName.removeClass("error")
            streetNumber.removeClass("error")
            $("#errorCountry").css("display","none")

        }else{
            errors.push("Enter all address information.")
            $("#answer").css("display","block")
            country.addClass("error")
            city.addClass("error")
            zipCode.addClass("error")
            streetName.addClass("error")
            streetNumber.addClass("error")
        }

        if(enterAddress == 5){
            if(!regexCity.test(city.val())){
                errors.push("Wrong city name entered.")
                city.addClass("error")
            }
            else{
                city.removeClass("error")
            }
            if(!regexZipCode.test(zipCode.val())){
                errors.push("Wrong zip code entered.")
                zipCode.addClass("error")
            }
            else{
                zipCode.removeClass("error")
            }

            if(!regexStreetName.test(streetName.val())){
                errors.push("Wrong street name entered.")
                streetName.addClass("error")
            }else{
                streetName.removeClass("error")
            }

            if(!regexStreetNumber.test(streetNumber.val())){
                errors.push("Wrong street number entered.")
                streetNumber.addClass("error")
            }else{
                streetNumber.removeClass("error")
            }

        } 
        if(errors.length == 0){
            
            let dataForm = {
                firstName : firstName.val(),
                lastName : lastName.val(),
                email : email.val(),
                username : username.val(),
                password : password.val(),
                phone : phone.val()
            }
            
            if(enterAddress == 5){
                dataForm.country = country.val();
                dataForm.city = city.val();
                dataForm.zipCode = zipCode.val();
                dataForm.streetName = streetName.val();
                dataForm.streetNumber = streetNumber.val();
                
            }

            ajaxCallBack("models/processreg.php", "post", dataForm, function(result){
               
                    window.location.replace("profile.php")
                
                
            }) 
   
        }
        
        
       
    })
    //LOGIN
    $(document).on("click","#btnLog", function(){
        let username = $("#tbUsername")
        let password = $("#tbPass")

        let regexUsername = /^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$/;
        let regexPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/


        let errors = []
        if(!regexUsername.test(username.val())){
            errors.push("Wrong username entered.")
            username.addClass("error")
            $("#errorUsername").css("display","block")
            console.log(username.val())
        }else{
            username.removeClass("error")
            $("#errorUsername").css("display","none")
        }

        if(!regexPass.test(password.val())){
            errors.push("Wrong password entered.")
            password.addClass("error")
            $("#errorPass").css("display","block")
            console.log(username.val())
        }else{
            password.removeClass("error")
            $("#errorPass").css("display","none")
        }
        
        if(errors.length == 0){
            
            let dataForm = {
                username : username.val(),
                password : password.val(),
                
            }
            

            ajaxCallBack("models/processlogin.php", "post", dataForm, function(result){
                if(result == 1){
                    window.location.replace("profile.php")
                }else{
                    
                    $("#acc").html(`Your account <h7 id="Husername" data-user = "${result.user}"> ${result.user} </h7> has been blocked.`)
                    $("#blocked").css("display","block")
                    $("#reason").html(result.reason)
                }
 
            })  
        }
        
    })

    //LOGOUT
    $(document).on("click","#btnLogout", function(){

        ajaxCallBack("models/processlogout.php","post",1,function(result){
            window.location.replace("login.php")
        })
        
    })

    //SEND MESSAGE
    $(document).on("click","#btnBlock", function(){
        let username = $("#Husername").data('user');
        let message = $("#tbText").val()
        
        let data = {
            username : username,
            message : message
        }
        $("#blocked").css("display","none");
        ajaxCallBack("models/message.php", "post",data, function(result){
            
            $("#success").css("display","block").html(result);
            
        })

        
        
    })

    //EDIT BTN PRINT
    $(document).on("click","#btnEdit", function(){
        let idUser = ($("#btnEdit").data('user'))
        let dataSend = {idUser : idUser,
                    i: 1}
        ajaxCallBack("models/edituser.php", "post", dataSend,function(result){

            let data = result;
            if(data.user){
                let form =''
            form += `<form action="models/changeimg.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group my-3">
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Change profile picture</label>
                        <input class="form-control" type="file" name="formFile">
                        <input type="submit" value="Change" data-user="${data.user.User_ID}" name="btnChange" class="btn btn-primary mt-1" />
                    </div>
                </div>
            </div>
            </form>
            <form action="" novalidate>
            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <div><input type="text" id="tbFirstName" class="form-control "  value = "${data.user.User_FirstName}"/></div>
                        <div id="errorFName" class="invalid-feedback">
                            Please enter a valide first name.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" id="tbLastName" class="form-control" value = "${data.user.User_LastName}"/>
                        <div id="errorLName" class="invalid-feedback">
                            Please enter a valide last name.
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" id="tbPhone" class="form-control" / value = "${data.user.User_Phone}">
                        <div id="errorPhone" class="invalid-feedback">
                            Please enter a valide phone number.
                            (xxx xxx xxx(x))

                        </div>
                    </div>
                </div>
            </div>


            <div id="answer" class="invalid-feedback">
                Enter all address information.
            </div>

            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Country</label>
                        <select name="" id="ddlCountries" class="form-control">
                            <option value="0">Choose...</option>`
                            for(let c of data.countries){
                                if(c.Country_ID == data.user.Country_ID){
                                    form +=`<option value = ${c.Country_ID} selected>${c.country_name}<option>`
                                    continue;
                                }
                                form +=`<option value = ${c.Country_ID}>${c.country_name}</option>`
                            }
                    form += `
                        </select>
                        <div id="errorCountry" class="invalid-feedback">
                            Please choose a country.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">City</label>
                        <input type="text" name="" id="tbCity" value = "${data.user.Address_City}" class="form-control">

                        <div id="errorCity" class="invalid-feedback">
                            Please enter a valide city name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Zip Code</label>
                        <input type="text" name="" id="tbZipCode" value = "${data.user.Zip_Code}" class="form-control">
                        <div id="errorZip" class="invalid-feedback">
                            Please enter a valide zip code.
                        </div>
                    </div>

                    
                </div>
            </div>

            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Street Name</label>
                        <input type="text" name="" id="tbStreetName" value = "${data.user.	Address_Street}" class="form-control">
                        <div id="errorSName" class="invalid-feedback">
                            Please enter a valide street name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Street Number</label>
                        <input type="text" name="" id="tbStreetNumber" value = "${data.user.Address_Number}" class="form-control">
                        <div id="errorSNum" class="invalid-feedback">
                            Please enter a valide street number.
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group my-3">

            <div class="row">
                    <div class="col-md-6">
                        <label for="">Old Password</label>
                        <input type="password" id="tbPasswordOld" class="form-control" />


                        <div id="errorPassC" class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">New Password</label>
                        <input type="password" id="tbPassword" class="form-control" />
                        <div id="errorPass" class="invalid-feedback">
                            Please enter a valide password.
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">New Password Check</label>
                        <input type="password" id="tbPasswordC" class="form-control" />

                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                        <label class="form-check-label" for="flexCheckDefault">
                            Show pasword
                        </label>
                    </div>
                        <div id="errorPassC" class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                </div>
                

            </div>

            <input type="button" value="Save" data-user="${data.user.User_ID}" id="btnSave" class="btn btn-primary" />
            <input type="button" value="Cancel" data-user="${data.user.User_ID}" id="btnCancel" class="btn btn-outline-primary" />
            <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                            </div>
        </form>`
        $("#userData").html(form) 
            }else{
                let dataSend = {idUser : idUser,
                    i: 2}
                ajaxCallBack("models/edituser.php", "post", dataSend,function(result){
                    
                    let data = result;
                    
                    let form =''
            form += `<form action="models/changeimg.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group my-3">
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Change profile picture</label>
                        <input class="form-control" type="file" name="formFile">
                        <input type="submit" value="Change" data-user="${data.user.User_ID}" name="btnChange" class="btn btn-primary mt-1" />
                    </div>
                </div>
            </div>
            </form>
            <form action="" novalidate>
            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <div><input type="text" id="tbFirstName" class="form-control "  value = "${data.user.User_FirstName}"/></div>
                        <div id="errorFName" class="invalid-feedback">
                            Please enter a valide first name.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" id="tbLastName" class="form-control" value = "${data.user.User_LastName}"/>
                        <div id="errorLName" class="invalid-feedback">
                            Please enter a valide last name.
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" id="tbPhone" class="form-control" / value = "${data.user.User_Phone}">
                        <div id="errorPhone" class="invalid-feedback">
                            Please enter a valide phone number.
                            (xxx xxx xxx(x))

                        </div>
                    </div>
                </div>
            </div>


            <div id="answer" class="invalid-feedback">
                Enter all address information.
            </div>

            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Country</label>
                        <select name="" id="ddlCountries" class="form-control">
                            <option value="0">Choose...</option>`
                            
                            for(let c of data.countries){
                                
                                form +=`<option value = ${c.Country_ID}>${c.country_name}</option>`
                            }
                    form += `
                        </select>
                        <div id="errorCountry" class="invalid-feedback">
                            Please choose a country.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">City</label>
                        <input type="text" name="" id="tbCity" class="form-control">

                        <div id="errorCity" class="invalid-feedback">
                            Please enter a valide city name.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Zip Code</label>
                        <input type="text" name="" id="tbZipCode" class="form-control">
                        <div id="errorZip" class="invalid-feedback">
                            Please enter a valide zip code.
                        </div>
                    </div>

                    
                </div>
            </div>

            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-8">
                        <label for="">Street Name</label>
                        <input type="text" name="" id="tbStreetName" class="form-control">
                        <div id="errorSName" class="invalid-feedback">
                            Please enter a valide street name.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Street Number</label>
                        <input type="text" name="" id="tbStreetNumber"  class="form-control">
                        <div id="errorSNum" class="invalid-feedback">
                            Please enter a valide street number.
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group my-3">

            <div class="row">
                    <div class="col-md-6">
                        <label for="">Old Password</label>
                        <input type="password" id="tbPasswordOld" class="form-control" />


                        <div id="errorPassC" class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">New Password</label>
                        <input type="password" id="tbPassword" class="form-control" />
                        <div id="errorPass" class="invalid-feedback">
                            Please enter a valide password.
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group my-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">New Password Check</label>
                        <input type="password" id="tbPasswordC" class="form-control" />

                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                        <label class="form-check-label" for="flexCheckDefault">
                            Show pasword
                        </label>
                    </div>
                        <div id="errorPassC" class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>
                </div>
                

            </div>

            <input type="button" value="Save" data-user="${data.user.User_ID}" id="btnSave" class="btn btn-primary" />
            <input type="button" value="Cancel" data-user="${data.user.User_ID}" id="btnCancel" class="btn btn-outline-primary" />
            <div class="alert alert-danger my-3" style="display: none;" id="dbanswer" role="alert">

                            </div>
        </form>`
        $("#userData").html(form)  
                })
            }

            
        })
        
    })

    //CANCEL EDIT BTN
    $(document).on("click","#btnCancel", function(){
        
        let idUser = ($("#btnCancel").data('user'))
        
        let dataSend = {idUser : idUser,
                        i:1}
        ajaxCallBack("models/edituser.php", "post", dataSend,function(result){

            let data = result;
            if(data.user){
                let userData = '' 
            userData += `<div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            ${data.user.User_FirstName} ${data.user.User_LastName}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        ${data.user.User_Email}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        ${data.user.User_Phone}
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Address</h6>
        </div>
        <div class="col-sm-9 text-secondary">`
            if(data.user.Address_ID ){
                for(let c of data.countries){
                    if(c.Country_ID == data.user.Country_ID){
                        userData +=`${c.country_name}, `
                      
                        break;
                    }
                    
                }
                userData +=`${data.user.Address_City}, ${data.user.Address_Street} ${data.user.Address_Number}`
            }else{
                userData +=`No address`
            }
            userData += `</div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-outline-primary" id="btnEdit" data-user="${data.user.User_ID}">Edit</a>
        </div>


    </div>`
    $("#userData").html(userData)
            }else{
                let dataSend = {idUser : idUser,
                    i:2}
                    ajaxCallBack("models/edituser.php", "post", dataSend,function(result){
                        let data = result;
                        let userData = '' 
            userData += `<div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            ${data.user.User_FirstName} ${data.user.User_LastName}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        ${data.user.User_Email}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        ${data.user.User_Phone}
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Address</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        No address
        </div></div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-outline-primary" id="btnEdit" data-user="${data.user.User_ID}">Edit</a>
            </div>
    
    
        </div>`
            
            
    
    $("#userData").html(userData)
                    })
            }
            
        })

         
    })

    //SAVE EDIT BTN
    $(document).on("click","#btnSave", function(){
        let userId = $("#btnSave").data('user');
        let firstName = $("#tbFirstName")
        let lastName = $("#tbLastName")
        let phone = $("#tbPhone")
        let country = $("#ddlCountries")
        let city = $("#tbCity")
        let zipCode = $("#tbZipCode")
        let streetName = $("#tbStreetName")
        let streetNumber = $("#tbStreetNumber")
        let oldPassword = $("#tbPasswordOld")
        let newPassword = $("#tbPassword")
        let newPasswordC = $("#tbPasswordC")

        let regexName = /^[a-z ,.'-]+$/i;
        let regexPass = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
        let regexCity = /^[a-zA-Z',.\s-]{1,25}$/
        let regexZipCode = /(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/
        let regexStreetName = /^[a-z ,.'-]+$/i;
        let regexStreetNumber = /(\b.*\d+.*?\b)/
        let regexPhone = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{3,4}$/

        let errors = []
        
        if(!regexName.test(firstName.val())){
            
            errors.push("Wrong first name entered.")
            
            firstName.addClass("error")
        }else{
            firstName.removeClass("error")
        }
        
        if(!regexName.test(lastName.val())){
            errors.push("Wrong last name entered.")
            lastName.addClass("error")
        }else{
            lastName.removeClass("error")
        }
        if(!regexPhone.test(phone.val())){
            errors.push("Wrong phone entered.")
            phone.addClass("error")
        }else{
            phone.removeClass("error")
        }


        let enterPass = 0;
        if(oldPassword.val() != ""){
            enterPass++
        }
        if(newPassword.val() != ""){
            enterPass++
        }
        if(newPasswordC.val() != ""){
            enterPass++
        }

        if(enterPass == 0 || enterPass == 3){
            
            oldPassword.removeClass("error")
            newPassword.removeClass("error")
            newPasswordC.removeClass("error")
            
        }else{
            errors.push("Enter all pasword information.")
            oldPassword.addClass("error")
            newPassword.addClass("error")
            newPasswordC.addClass("error")
        }

        

        if(enterPass == 3){
          
            if(!regexPass.test(oldPassword.val())){
                errors.push("Wrong odl password entered.")
                oldPassword.addClass("error")
            }else{
                oldPassword.removeClass("error")
            }
            if(regexPass.test(newPassword.val())){
                newPassword.removeClass("error")
                if(newPasswordC.val() != newPassword.val()){
                    errors.push("Passwords do not match.")
                    passwordC.addClass("error")
                }else{
                    
                    newPasswordC.removeClass("error")
                }
            }else{
                errors.push("Wrong password entered.")
                newPassword.addClass("error")    
            }
        }
        

        let enterAddress = 0;
         if(country.val() != 0){
            enterAddress++ 
            country.removeClass("error")
        } else{
            country.addClass("error")
        }
        if(city.val() != ""){
            enterAddress++
           
        }
        if(zipCode.val() != ""){
            enterAddress++
            
        }
        if(streetName.val() != ""){
            enterAddress++
            
        }
        if(streetNumber.val() != ""){
            enterAddress++
            
        }

        

        
        if(enterAddress == 5 || enterAddress == 0){
            country.removeClass("error")
            city.removeClass("error")
            zipCode.removeClass("error")
            streetName.removeClass("error")
            streetNumber.removeClass("error")

        }else{
            errors.push("Enter all address information.")
            country.addClass("error")
            city.addClass("error")
            zipCode.addClass("error")
            streetName.addClass("error")
            streetNumber.addClass("error")
        }

        if(enterAddress == 5){
            if(!regexCity.test(city.val())){
                errors.push("Wrong city name entered.")
                city.addClass("error")
            }
            else{
                city.removeClass("error")
            }
            if(!regexZipCode.test(zipCode.val())){
                errors.push("Wrong zip code entered.")
                zipCode.addClass("error")
            }
            else{
                zipCode.removeClass("error")
            }

            if(!regexStreetName.test(streetName.val())){
                errors.push("Wrong street name entered.")
                streetName.addClass("error")
            }else{
                streetName.removeClass("error")
            }

            if(!regexStreetNumber.test(streetNumber.val())){
                errors.push("Wrong street number entered.")
                streetNumber.addClass("error")
            }else{
                streetNumber.removeClass("error")
            }
        }


        if(errors.length == 0){
            
            let dataForm = {
                userId : userId,
                firstName : firstName.val(),
                lastName : lastName.val(),
                phone : phone.val()
            }
            
            if(enterAddress == 5){
                dataForm.country = country.val();
                dataForm.city = city.val();
                dataForm.zipCode = zipCode.val();
                dataForm.streetName = streetName.val();
                dataForm.streetNumber = streetNumber.val();
                
            }

            if(enterPass == 3){
                dataForm.oldPassword = oldPassword.val();
                dataForm.newPassword = newPassword.val();
            }

            ajaxCallBack("models/editdata.php", "post", dataForm, function(result){
               
                    window.location.replace("profile.php")
                
                
            }) 
        }
    })
    
    //BLOCK USERS
    $(document).on("click","#btnBlockUser", function(){
        let userID = $("#ddlUser")
        let reason = $("#taReason")
        let error = 0
    
        if(userID.val() == 0){
            error++;
            $("#ddlUser").addClass("error")
            $("#errorUser").css("display","block")
            }else{
            $("#ddlUser").removeClass("error")
            $("#errorUser").css("display","none")
        }

        if(reason.val() == ""){
            error++;
            $("#taReason").addClass("error")
            $("#errorReason").css("display","block")
        }else{
            $("#taReason").removeClass("error")
            $("#errorReason").css("display","none")
        }

        let data = {
            userid : userID.val(),
            reason : reason.val()
        }
        if(error == 0){
            ajaxCallBack("models/block.php", "post", data, function(result){
                if(result){
                    console.log(result)
                    $("#success").css("display","block")
                }
                
            })
        } 
           
    })  

    //ADD CATEGORY
    $(document).on("click", "#btnCategory", function(){
        let CategoryName = $("#tbCategoryName")
        let regexCatName = /^[a-zA-Z',.\s+]{1,25}$/;

        let error = 0;
        if(!regexCatName.test(CategoryName.val())){
            error ++;
            CategoryName.addClass("error")
            $("#errorCatName").css("display","block")
        }else{
            CategoryName.removeClass("error")
            $("#errorCatName").css("display","none")
        }

        if(error == 0){
            let data = {
                CategoryName : CategoryName.val()
            }
            
            ajaxCallBack("models/addcat.php", "post", data, function(result){
                window.location.replace("profile.php")
            })
        }
    })

    //ADD BRAND
    $(document).on("click", "#btnBrand", function(){
        let BrandName = $("#tbBrandName")
        let regexBrandName = /^[a-zA-Z',.\s+]{1,25}$/;

        let error = 0;
        if(!regexBrandName.test(BrandName.val())){
            error ++;
            BrandName.addClass("error")
            $("#errorBrandName").css("display","block")
        }else{
            BrandName.removeClass("error")
            $("#errorBrandName").css("display","none")
        }

        if(error == 0){
            let data = {
                BrandName : BrandName.val()
            }
            
            ajaxCallBack("models/addbrand.php", "post", data, function(result){
                window.location.replace("profile.php")
            })
        }
    })

    let ProductObj = new Product();

    //ADD PRODUCT
    $(document).on("click", "#btnProduct", ProductObj.process);

    
    let page
    
    //PAGINATION
    $(document).on("click", ".moveProd", function(){
        page = $(this).data("page")
        
        data = {
            page : page
        }
        

        ajaxCallBack("models/pagprd.php", "post", data, function(result){
           
            
            prod = result.prod
            pages = result.pages
            num = page * 16 + 1

            printProd(prod, num);
            printPages(pages)

            
        })

        
    })
    //PAGINATION SHOP
   
    $(document).on("click", ".moveProdShop", function(){
        let pageShop = $(this).data("page")
              
        data = {
            page : pageShop
        }
        

        ajaxCallBack("models/pagprd.php", "post", data, function(result){
           
            
            prod = result.prod
            pages = result.pages
            num = page * 16 + 1

            printProdShop(prod, num);
            printPagesShop(pages)

            
        })

        
    })

    //CHANGE QUANTITY
    $(document).on("click", ".changeQ", function(){
        let id = $(this).data('id');
        let quantity = $(`#${id}`)
        if(quantity.val() != ""){
            data = {
                id : id,
                quantity : quantity.val()
            }
    
            ajaxCallBack("models/changequantity.php", "post", data, function(result){
                
                if(page){
                    data = {
                        page : page
                    }
                    ajaxCallBack("models/pagprd.php", "post", data, function(result){
                        let prod = result.prod
                        let pages = result.pages
                        let num = page * 15 + 1


                        printProd(prod, num);
                        printPages(pages)
                    })
                }else{
                    ajaxCallBack("models/returnprod.php", "post", data, function(result){
                        let num = 1;
                        printProd(result, num);
    
                    })
    
    
                }
                
            })
        }else{
            quantity.addClass('error')
        }
        
        
    })

    //CHANGE ACTIVITY
    $(document).on("click", ".changeA", function(){
        let id = $(this).data('id');
        data = {id : id}
        console.log(id)
        ajaxCallBack("models/changeactivity.php", "post", data, function(result){
            
                
                if(page){
                    data = {
                        page : page
                    }
                    ajaxCallBack("models/pagprd.php", "post", data, function(result){
                        let prod = result.prod
                        let pages = result.pages
                        let num = page * 15 + 1


                        printProd(prod, num);
                        printPages(pages)
                    })
                }else{
                    ajaxCallBack("models/returnprod.php", "post", data, function(result){
                        let num = 1;
                        printProd(result, num);
    
                    })
    
    
                }
            
        
                if(prod){
                    printProd(prod, num);
                    printPages(pages)
                }else{
                    ajaxCallBack("models/returnprod.php", "post", data, function(result){
                        let num = 1;
                        printProd(result, num);
    
                    })
    
    
                }

        }) 

    })
    //CHANGE CAT BRAND
    $(document).on("change", ".ddlShop", function(){
        let idCat = $("#ddlCategoryShop").val();
        let idBrand = $("#ddlBrandShop").val();

        let data = {
            idCat : idCat,
            idBrand : idBrand,
            page : 0
        }
        
        ajaxCallBack("models/printshop.php", "POST", data, function(result){
            prod = result.prod
            pages = result.pages
            num = page * 16 + 1

            printProdShop(prod, num);
            printPageShopCB(pages)
        })
 

    })
    //PAGINATION CAT BRAND
    $(document).on("click", ".moveProdShopCB", function(){
        let pageShop = $(this).data("page")
        let idCat = $("#ddlCategoryShop").val();
        let idBrand = $("#ddlBrandShop").val();

        let data = {
            idCat : idCat,
            idBrand : idBrand,
            page : pageShop
        }

        ajaxCallBack("models/printshop.php", "POST", data, function(result){
            prod = result.prod
            pages = result.pages
            num = page * 16 + 1

            printProdShop(prod, num);
            printPageShopCB(pages)
        })
    })
    //ALLERT BASKET
    $(document).on("click", ".buy", function(){
        let id = $(this).data('product')
        
        data = {
            id : id
        }
        

        ajaxCallBack("models/basket.php", "post", data, function(result){
            
            
            let print = `<button type="button" class="btn btn-outline-danger position-relative" id="btnBasket">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
            </button>`

            $("#basket").html(print);
           
        
        })
    })
    //REDIRECTION ON BASKET
    $(document).on("click","#btnBasket", function(){
        window.location.replace("basket.php")
    })
    //SHOPPING CARD
    $(document).on("focusout", ".tbQuantity", function(){
        let id = $(this).data("idq");
        let quantity = $(this);
        
        if(quantity.val() == "" || quantity.val() <= 0){
            quantity.addClass("error");
        }else{
            data = {
                id : id,
                quantity : quantity.val()
            }
            
            ajaxCallBack("models/updatequantity.php", "post",data, function(result){
                
                let print = ``;
                let products = result;
                let total = 0;
                
                printCard(print, products, total);
            })

        }
    })

    //REMOVE PRODUCT FROM BASKET
    $(document).on("click",".btnDeleteBasket", function(){
        let id = $(this).data("idd");
        let data = {id : id}
        ajaxCallBack("models/removebasket.php", "post", data, function(result){
            let print = ``;
                let products = result;
                let total = 0;
                
                printCard(print, products, total);
        })
    })
    //BACK TO SHOP
    $(document).on("click", ".btnBackShop", function(){
        window.location.replace("shop.php")
    })
    //GO TO ORDERIG
    $(document).on("click", ".btnOrdering", function(){
        let value = $(this).val();
        let data = {value : value};
        ajaxCallBack("ordering.php", "post",data, function(result){
            window.location.replace("ordering.php");
        })
    })
    //BUY PRODUCTS
    $(document).on("click", "#btnPurchase", function(){
        let country = $("#ddlCountries")
        let city = $("#tbCity")
        let zipCode = $("#tbZipCode")
        let streetName = $("#tbStreetName")
        let streetNumber = $("#tbStreetNumber")

        let regexCity = /^[a-zA-Z',.\s+]{1,25}$/
        let regexZipCode = /(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)/
        let regexStreetName = /^[a-z ,.'-]+$/i;
        let regexStreetNumber = /(\b.*\d+.*?\b)/
        let errors = []


            if(country.val() != 0){   
                country.removeClass("error")
                $("#errorCountry").css("display","none")
            } else{
                country.addClass("error")
                $("#errorCountry").css("display","block")
            }
            if(!regexCity.test(city.val())){
                errors.push("Wrong city name entered.")
                city.addClass("error")
            }
            else{
                city.removeClass("error")
            }
            if(!regexZipCode.test(zipCode.val())){
                errors.push("Wrong zip code entered.")
                zipCode.addClass("error")
            }
            else{
                zipCode.removeClass("error")
            }

            if(!regexStreetName.test(streetName.val())){
                errors.push("Wrong street name entered.")
                streetName.addClass("error")
            }else{
                streetName.removeClass("error")
            }

            if(!regexStreetNumber.test(streetNumber.val())){
                errors.push("Wrong street number entered.")
                streetNumber.addClass("error")
            }else{
                streetNumber.removeClass("error")
            }
        

            if(errors.length == 0){
            
                let dataForm = {
                    country : country.val(),
                    city : city.val(),
                    zipCode : zipCode.val(),
                    streetName : streetName.val(),
                    streetNumber : streetNumber.val(),
                }
    
                ajaxCallBack("models/purchase.php", "post", dataForm, function(result){
                        window.location.replace("profile.php");
                    }) 
       
            } 


    })
    //GO TO BASKET FROM VIEW
    $(document).on("click",".shop-button", function(){
        let quantity = $("#quantity_input");
        let id = $(this).data("idprod");
        
        if(quantity.val() == "" || quantity.val() <= 0){

            $("#dbanswer").html("Wrong quantity");
            $("#dbanswer").css("display","block");
        }else{
            data = {
                id : id,
                quantity : quantity.val()
            }
            
            ajaxCallBack("models/addbasketview.php", "post",data, function(result){
                window.location.replace("basket.php");
                
            }) 

        }
    })
})
// AJAXCALLBACK FUNCTION
function ajaxCallBack(url, method,data, result){
    $.ajax({
        url:url,
        method: method,
        data : data,
        dataType: "json",
        success: result,
        error: function(xhr){
            let print = '';
            let errors = xhr.responseJSON
            $("#dbanswer").html("")
            
            let i = 0;
            if(xhr.status == 404){
                i++
                window.location.replace("404.php")
            }
            if(xhr.status == 422){
                i++
                print+="<ul>"
                for(let e of errors){
                print+=`<li>${e}</li>`
                }
                print+="</ul>"
            }
            if(xhr.status == 500){
                i++
                print+="<ul>"
                for(let e of errors){
                print+=`<li>${e}</li>`
                }
                print+="</ul>"
            }
            if(i!=0){
                $("#dbanswer").css("display","block").html(print)
                $('#dbanswer').delay(5000).fadeOut('slow')
                
            }
            
        }
    })
}
//SHOW PASSWORD
function myFunction() {
    var x = document.getElementById("tbPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

    var x = document.getElementById("tbPasswordC");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
if(document.getElementById("tbPasswordOld")){
    var x = document.getElementById("tbPasswordOld");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}
    
  }
// UNBLOCK
function unblock(id){
    let userid = id;
 
    data = {
        userid : userid
    }


    ajaxCallBack("models/unblock.php", "POST", data, function(result){
        let users = result;
        let print = ""
        let i=1;

             for(let u of users){
                print += ` <tr>
                <td class="col-md-1">${i}.</td>
                <td class="col-md-1">${u.User_ID}</td>
                <td>${u.User_Username}</td>
                <td>${u.Block_Date}</td>
                <td>${u.Block_Reason}</td>
                <td>${u.Message_Text}</td>
                <td class="col-md-1">
                    <button type="button" onclick=unblock(${u.User_ID}) class="btnUnblock btn btn-dark">Unblock</button>

                </td>

            </tr>`
                i++
            } 


        
        
        $("#blockedUsers").html(print)
        
    }) 
}
//PRINT PRODUCT
function printProd(prod, num){


    let print ='';
    for(let p of prod){
                
        if(p.Product_Activity == 1){
            
            if(p.Product_UnitsInStock == 0){
                
                print += `<tr class="bg-warning">
                <td class="col-md-1">${num}</td>
                <td class="col-md-1">${p.Product_ID}</td>
                <td>${p.Product_Name}</td>

                <td>Active</td>
                <td>${p.Category_Name}</td>
                <td>${p.Brand_Name}</td>
                <td class="col-md-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="${p.Product_ID}" value=" ${p.Product_UnitsInStock}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary changeQ" data-id="${p.Product_ID}" type="button">Change</button>
                        </div>
                    </div>
                </td>
                <td class="col-md-1"><button type="button" data-id="${p.Product_ID}" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
            </tr>`
            }else{
                
                print += `<tr>
                <td class="col-md-1">${num}</td>
                <td class="col-md-1">${p.Product_ID}</td>
                <td>${p.Product_Name}</td>

                <td>Active</td>
                <td>${p.Category_Name}</td>
                <td>${p.Brand_Name}</td>
                <td class="col-md-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="${p.Product_ID}" value=" ${p.Product_UnitsInStock}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary changeQ" data-id="${p.Product_ID}" type="button">Change</button>
                        </div>
                    </div>
                </td>
                <td class="col-md-1"><button type="button" data-id="${p.Product_ID}" class=" changeA btn btn-outline-secondary">Deactivate</button></td>
            </tr>`
            }
        }else{
            
            print += `<tr class="bg-danger">
                <td class="col-md-1">${num}</td>
                <td class="col-md-1">${p.Product_ID}</td>
                <td>${p.Product_Name}</td>

                <td>Not active</td>
                <td>${p.Category_Name}</td>
                <td>${p.Brand_Name}</td>
                <td class="col-md-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="${p.Product_ID}" value=" ${p.Product_UnitsInStock}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary changeQ" data-id="${p.Product_ID}" type="button">Change</button>
                        </div>
                    </div>
                </td>
                <td class="col-md-1"><button type="button" data-id="${p.Product_ID}" class=" changeA btn btn-outline-secondary">Activate</button></td>
            </tr>`
        }
        num++
    }
    
    $("#products").html(print);
}

//PRINT PAGE
function printPages(pages){
    let html ='';
    for(let i = 0; i<pages;i++){
        html+=`<li class="page-item"><a data-page="${i}" class="page-link moveProd" href="#">${i+1}</a></li>`
    }
    $("#paginationPage").html(html)
}
//PRINT PRODUCT SHOP
function printProdShop(prod, num){
    let print = ``;
    if(prod.length > 0){
        for(let p of prod){
            if(p.Product_Activity == 1 && p.Product_UnitsInStock > 0){
                print += `<div class="col-md-3 my-3">
    
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="bbb_deals_title"> ${p.Product_Name}</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <a href="view.php?${p.Product_ID}">
                                <div class="bbb_deals_image"><img src="${p.Image_Url}" alt=""></div>
                            </a>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category">${p.Category_Name}</div>
    
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_price ml-auto">$ ${p.Product_UnitPrice}.00</div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <div class="available_title">Available: <span>${p.Product_UnitsInStock}</span></div>
    
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" data-product = "${p.Product_ID}" class="buy btn btn-outline-secondary">Add to card</button>
                </div>
    
                </div>`
            }
        }
    }else{
        print += "No Products."
    }
    
    
    $("#produstsShop").html(print)
}

//PRINT PAGE SHOP
function printPageShop(pages){
    let html ='';
    for(let i = 0; i<pages;i++){
        html+=`<li class="page-item"><a data-page="${i}" class="page-link moveProdShop" href="#">${i+1}</a></li>`
    }
    $("#paginationPage").html(html)
}
//PRINT PAGE SHOP CATEGORY BRAND
function printPageShopCB(pages){
    let html ='';
    for(let i = 0; i<pages;i++){
        html+=`<li class="page-item"><a data-page="${i}" class="page-link moveProdShopCB" href="#">${i+1}</a></li>`
    }
    $("#paginationPage").html(html)
}
class Product {
    polje = "";
    process(){
        let tbProductName = $("#tbProductName")
        let tbUnitPrice = $("#tbUnitPrice")
        let taDescription = $("#taDescription")
        let tbUnits = $("#tbUnits")
        let rbactivity = document.querySelector('input[name="rbactivity"]:checked');
        let ddlCat = $("#ddlCat")
        let ddlBrand = $("#ddlBrand")
        let imgProd = $("#imgProd")[0].files[0];

        let regexPrice = /^[0-9]([.][0-9])?$/
        let regexUnit = /\d+/
        //let imgProd = $('#imgProd').prop('files')[0]

        console.log(rbactivity.value)

        let error = 0
        if(tbProductName.val() == ""){
            error ++;
            tbProductName.addClass("error")
            $("#errorProdName").css("display","block")
        }else{
            tbProductName.removeClass("error")
            $("#errorProdName").css("display","none")
        }


        if(tbUnitPrice.val()  == "" && tbUnitPrice.val() == 0 && !regexPrice.test(tbUnitPrice)){
            error ++;
            tbUnitPrice.addClass("error")
            $("#errorUnitPrice").css("display","block")
        }else{
            tbUnitPrice.removeClass("error")
            $("#errorUnitPrice").css("display","none")
        }

        if(taDescription.val()  == ""){
            error ++;
            taDescription.addClass("error")
            $("#errorDescription").css("display","block")
        }else{
            taDescription.removeClass("error")
            $("#errorDescription").css("display","none")
        }

        if(tbUnits.val()  == "" && !regexUnit.test(tbUnits)){
            error ++;
            tbUnits.addClass("error")
            $("#errorUnits").css("display","block")
        }else{
            tbUnits.removeClass("error")
            $("#errorUnits").css("display","none")
        }


        if(!rbactivity){
            error ++;
            
            $("#errorActive").css("display","block")
        }else{
            
            $("#errorActive").css("display","none")
        }

        if(ddlCat.val()  == 0){
            error ++;
            ddlCat.addClass("error")
            $("#errorCat").css("display","block")
        }else{
            ddlCat.removeClass("error")
            $("#errorCat").css("display","none")
        }

        if(ddlCat.val()  == 0){
            error ++;
            ddlBrand.addClass("error")
            $("#errorBrand").css("display","block")
        }else{
            ddlBrand.removeClass("error")
            $("#errorBrand").css("display","none")
        }

        let aprovedTypes = ["image/jpg", "image/jpeg", "image/png"];
        
        if(imgProd.size > 500000 || !aprovedTypes.includes(imgProd.type)){
            error ++;
            
            $("#errorImg").css("display","block")
        }else{
            
            $("#errorImg").css("display","none")
        } 
        

        if(error == 0){
            let data =  new FormData();
            data.append("tbProductName",tbProductName.val());
            data.append("tbUnitPrice",tbUnitPrice.val());
            data.append("taDescription",taDescription.val());
            data.append("tbUnits",tbUnits.val());
            data.append("rbactivity",rbactivity.value);
            data.append("ddlCat",ddlCat.val());
            data.append("ddlBrand",ddlBrand.val());
            data.append("imgProd",imgProd);

            console.log(data)
            console.log(tbProductName.val())
           

            ajaxCallBackFile("models/addproducts.php", "post", data, function(result){
                
                $("#success").css("display", "block");
                $('#success').delay(5000).fadeOut('slow')

                $("#tbProductName").val() = ""
                $("#tbUnitPrice").val() = ""
                $("#taDescription").val() = ""
                $("#tbUnits").val() = ""
                $("#ddlCat").val() = ""
                $("#ddlBrand").val() = ""
            }) 
        }  
    }
}
//AJAX CALLBACK FILE FUNCTION
function ajaxCallBackFile(url, method, data, result){
    $.ajax({
        url: url,
        method: method,
        data: data,
        contentType:false,
        processData: false,
        success: result,
        error: function(xhr){
            let print = '';
            let errors = xhr.responseJSON
            $("#dbanswer").html("")
            
            let i = 0;
            if(xhr.status == 404){
                i++
                window.location.replace("404.php")
            }
            if(xhr.status == 422){
                i++
                print+="<ul>"
                for(let e of errors){
                print+=`<li>${e}</li>`
                }
                print+="</ul>"
            }
            if(xhr.status == 500){
                i++
                print+="<ul>"
                for(let e of errors){
                print+=`<li>${e}</li>`
                }
                print+="</ul>"
            }
            if(i!=0){
                $("#dbanswer").css("display","block").html(print)
                $('#dbanswer').delay(5000).fadeOut('slow')
                
            }
        }
    });
}
//GO LOGIN
function goLogin(){
    window.location.replace("login.php")
}
//PRITN CARD
function printCard(print, products, total){
    console.log(products)
    if(products.length == 0){
        print += `No products.`
        let print1 = `
        </div>
    <div class="cart_buttons"> 
        <button type="button" class="btnBackShop button cart_button_clear">Back To Shop</button> 
    </div>`
    
    $("#basketCards").html(print)
    $("#total").html(print1)

    }else{
        for(let p of products){
            print += `<ul class="cart_list" >
            <li class="cart_item clearfix">
            <div class="cart_item_image"><img src="${p.Image_Url}" alt=""></div>
            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title">Name</div>
                    <div class="cart_item_text">${p.Product_Name}</div>
                </div>
                <div class="cart_item_color cart_info_col">
                    <div class="cart_item_title">Category</div>
                    <div class="cart_item_text">${p.Category_Name}</div>
                </div>
                <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title">Quantity</div>
                    <div class="cart_item_text"><input type="number" class="form-control tbQuantity" data-idq = "${p.Product_ID}" value="${p.Quantity}"></div>
                </div>
                <div class="cart_item_price cart_info_col">
                    <div class="cart_item_title">Price</div>
                    <div class="cart_item_text">$${p.Product_UnitPrice}.00</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title">Total</div>
                    <div class="cart_item_text">$${p.Total}.00</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <button type="button" class="btn-close btnDeleteBasket" data-idd = "${p.Product_ID}" aria-label="Close"></button>
                </div>
                
                
            </div>
        </li>
        </ul>`
        total += p.Total;
        }
    
        let print1 = `
        </div>
        <div class="order_total">
        <div class="order_total_content text-md-right">
            <div class="order_total_title">Order Total:</div>
            <div class="order_total_amount">$${total}.00</div>
        </div>
    </div>
    <div class="cart_buttons"> 
        <button type="button"  class="btnBackShop button cart_button_clear">Back To Shop</button> 
        <button type="button" value="ordering"  class="btnOrdering button cart_button_checkout">Ordering</button> 
    </div>`
    
    $("#basketCards").html(print)
    $("#total").html(print1)

    }

    
    
}


