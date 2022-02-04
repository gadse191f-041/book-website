let users_ = [];

let table = document.getElementById('usersTable');



$(document).ready(function() {
    
    
    let dataUrl = "../req/getTableDta.php?users=";

    const tableView = (url)=>{

        $.getJSON(url, function(result) {
        console.log(result);
        users_ = result;
        $.each(result, function(i, user) {
        

            let template = `<tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.address}</td>
                        <td>${user.city}</td>
                        <td>${user.postalcode}</td>
                        <td>${user.country}</td>
                        <td>${user.contact}</td>
                        <td ><button class="item-del" onclick="removeUser(${i})"><i class="fas fa-trash"></i></button></td>
                        </tr>`;

            table.innerHTML += template;

        }); 
        

        });

    }


    tableView(dataUrl);
    
    
});



let search = document.getElementById('userSearch');

search.addEventListener('keyup',()=>{


    let searchUrl = `../req/search.php?search=${search.value}&userSearch=`;

    $.getJSON(searchUrl, function(result) {
        console.log(result);

        table.innerHTML ="";

        Thead = `<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>city</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Contact</th>
                    <th></th>
                </tr>`;

        table.innerHTML += Thead;
        
        $.each(result, function(i, user) {

            
            let template = `<tr>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.address}</td>
                        <td>${user.city}</td>
                        <td>${user.postalcode}</td>
                        <td>${user.country}</td>
                        <td>${user.contact}</td>
                        <td ><button class="item-del" onclick="removeUser(${i}><i class="fas fa-trash"></i></button></td>
                        </tr>`;

            table.innerHTML += template;

        }); 

    });
});





const removeUser = (i)=>{
    console.log(users_[i].uid);
 
 
   let conf = confirm(`Are you sure you want to delete ${users_[i].name} ?`);
 
   console.log(conf);
 
    if(conf == true){
 
        let dataString = `uid=${users_[i].uid}&deleteUser=`;
 
        $.ajax({
            type: "POST",
            url: `../req/deleteDta.php?`,
            data: dataString,
            crossDomain: true,
            cache: false,
            success: function(data) {
                if (data == "done") {
                    alert("User Deleted");
                    location.reload();
                } else if (data == "error") {
                    alert("Error");
                }
            }
        });
 
    }
 
 
  }