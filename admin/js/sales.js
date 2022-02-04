
let table = document.getElementById('saleTable');



$(document).ready(function() {
    
    let pendingCount = 0;
    let shippedCount = 0;
    let deliveredCount = 0;
    
    let dataUrl = "../req/getTableDta.php?sales=";

    const tableView = (url)=>{

        $.getJSON(url, function(result) {
        console.log(result);
        $.each(result, function(i, sale) {
        


            let badge = "";
            let badgeText = "";
            if(sale.state == "PE"){
                badge = "badge-pending";
                badgeText = "Payment Pending";
                pendingCount++;
            }
            else if(sale.state == "SP"){
                badge = "badge-shipped";
                badgeText = "Shipped";
                shippedCount++;
            }
            else{
                badge = "badge-delivered";
                badgeText = "Delivered";
                deliveredCount++;
            }
        
            
            let template = `<tr>

                        <td>${sale.sid}</td>
                        <td>${sale.dtm}</td>
                        <td>${sale.email}</td>
                        <td>${sale.bid}</td>
                        <td>${sale.qty}</td>
                        <td><span class="badge ${badge}">${badgeText}</span></td>
                        <td><button onclick='chageStat(${sale.sid})' class="sales-toggle"><i class="fas fa-dot-circle"></i></button></td>
                        </tr>`;

            table.innerHTML += template;

        }); 
        
        
        document.getElementById('pdCnt').innerHTML =  `${pendingCount}`;
        document.getElementById('spCnt').innerHTML =  `${shippedCount}`;
        document.getElementById('dlCnt').innerHTML =  `${deliveredCount}`;


        });

    }


    tableView(dataUrl);
    
    


});


const chageStat = (id)=>{

    let conf = confirm("Are you sure you want to change the state ?")

    console.log(conf);

    if(conf == true){

        let dataString = `sid=${id}&changeSalesStat=`;

        $.ajax({
            type: "POST",
            url: `../req/changeSalesStat.php?`,
            data: dataString,
            crossDomain: true,
            cache: false,
            success: function(data) {
                if (data == "done") {
                    //alert("Updated");
                    location.reload();
                } else if (data == "error") {
                    //alert("error");
                }
            }
        });

    }

    
}


let search = document.getElementById('saleSearch');

search.addEventListener('keyup',()=>{


    let searchUrl = `../req/search.php?search=${search.value}&saleSearch=`;

    $.getJSON(searchUrl, function(result) {
        console.log(result);

        table.innerHTML ="";

        Thead = `<tr>
                  <th>SID</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>BookID</th>
                  <th>QTY</th>
                  <th>State</th>
                  <th>Toggle</th>
                </tr>`;

        table.innerHTML += Thead;
        
        $.each(result, function(i, sale) {


           
            let badge = "";
            let badgeText = "";
            if(sale.state == "PE"){
                badge = "badge-pending";
                badgeText = "Payment Pending";
            }
            else if(sale.state == "SP"){
                badge = "badge-shipped";
                badgeText = "Shipped";
            }
            else{
                badge = "badge-delivered";
                badgeText = "Delivered";
            }
        
            
            let template = `<tr>

                        <td>${sale.sid}</td>
                        <td>${sale.dtm}</td>
                        <td>${sale.email}</td>
                        <td>${sale.bid}</td>
                        <td>${sale.qty}</td>
                        <td><span class="badge ${badge}">${badgeText}</span></td>
                        <td><button onclick='chageStat(${sale.sid})' class="sales-toggle"><i class="fas fa-dot-circle"></i></button></td>
                        </tr>`;

            table.innerHTML += template;

        }); 


    });



});


