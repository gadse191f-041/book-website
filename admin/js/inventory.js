
let data = [];

$(document).ready(function() {
    


    let table = document.getElementById('inventoryTable');

        



    let dataUrl = "../req/getTableDta.php?inventory=";

    $.getJSON(dataUrl, function(result) {
        console.log(result);
        data = result;
        $.each(result, function(i, book) {
            //let bid = book.bookname;

            let warningColor = 'black';
            let warningBold = 'none';
            if(book.stock <= 50){
                alert(`${book.bookname} is running out of stock. Current stock is ${book.stock}`);
                warningColor = '#9E0E0E';
                warningBold = 'bold';
            }

            
            template = `<tr>

                        <td style="color: ${warningColor};font-weight: ${warningBold};">${book.bookname}</td>
                        <td style="color: ${warningColor};font-weight: ${warningBold};">${book.author}</td>
                        <td style="color: ${warningColor};font-weight: ${warningBold};">${book.isbn}</td>
                        <td style="color: ${warningColor};font-weight: ${warningBold};">${book.category}</td>
                        <td style="color: ${warningColor};font-weight: ${warningBold};">Rs ${book.price}</td>
                        <td style="color: ${warningColor};font-weight: ${warningBold};">${book.stock}</td>
                        <td><button class="item-del" onclick="removeBook(${i})"><i class="fas fa-trash"></i></button></td>
                        <td><button class="item-update" onclick="reqEdit(${i})"><i class="fas fa-edit"></i></button></td>

                        </tr>`;

            table.innerHTML += template;

        });     
         


    });



    
    let searchBox = document.getElementById('bookSearch')
    searchBox.addEventListener('keyup',()=>{


        let searchUrl = `../req/search.php?search=${searchBox.value}&bookSearch=`;

        $.getJSON(searchUrl, function(result) {
            console.log(result);

            table.innerHTML ="";

            Thead = `<tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th></th>
                        <th></th>
                    </tr>`;

            table.innerHTML += Thead;
            
            $.each(result, function(i, book) {
                //let bid = book.bookname;
    
                let warningColor = 'black';
                let warningBold = 'none';
                if(book.stock <= 50){
                    alert(`${book.bookname} is running out of stock. Current stock is ${book.stock}`);
                    warningColor = '#9E0E0E';
                    warningBold = 'bold';
                }
    
                
                template = `<tr>
    
                            <td style="color: ${warningColor};font-weight: ${warningBold};">${book.bookname}</td>
                            <td style="color: ${warningColor};font-weight: ${warningBold};">${book.author}</td>
                            <td style="color: ${warningColor};font-weight: ${warningBold};">${book.isbn}</td>
                            <td style="color: ${warningColor};font-weight: ${warningBold};">${book.category}</td>
                            <td style="color: ${warningColor};font-weight: ${warningBold};">Rs ${book.price}</td>
                            <td style="color: ${warningColor};font-weight: ${warningBold};">${book.stock}</td>
                            <td><button class="item-del" onclick="removeBook(${i})"><><i class="fas fa-trash"></i></button></td>
                            <td><button class="item-update" onclick="reqEdit(${i})"><i class="fas fa-edit"></i></button></td>
    
                            </tr>`;
    
                table.innerHTML += template;
    
            }); 

    
        });

    });




});


const reqEdit = (i)=>{
   // console.log(data[i].bookname);
   let temp =  data[i].bookPath.split(".")[0].split("/");
   
    url = `./updateBook.php?bookID=${data[i].bid}
            &bookName=${data[i].bookname}
            &bookAuthor=${data[i].author}
            &bookISBN=${data[i].isbn}
            &bookStock=${data[i].stock}
            &bookPrice=${data[i].price}
            &bookCat=${data[i].category}
            &bookDescription=${data[i].description}
            &path=${temp[0]}/${temp[1]}
            &newArr=${data[i].newArr}
            &bestSell=${data[i].bestSell}
            &updateBook=`;




  window.open(url,'_self');

 }


 const removeBook = (i)=>{
   console.log(data[i].bid);


   let conf = confirm(`Are you sure you want to delete ${data[i].bookname} by ${data[i].author} ?`);

   console.log(conf);

   if(conf == true){

       let dataString = `bid=${data[i].bid}&deleteBook=`;

       $.ajax({
           type: "POST",
           url: `../req/deleteDta.php?`,
           data: dataString,
           crossDomain: true,
           cache: false,
           success: function(data) {
               if (data == "done") {
                   alert("Book Delete Successful");
                   location.reload();
               } else if (data == "error") {
                   alert("Error");
               }
           }
       });

   }


 }