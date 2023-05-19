<?php include('add_products.php');?>
<?php include('delete_product.php');?>
<?php include('edit_product.php');?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>   
      <meta charset="UTF-8">
      <title>Seller Dashboard</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Boxicons CDN Link -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="seller_product.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
   <body>
      <!---Sidebar-->
      <div class="sidebar">
         <div class="d-flex flex-column align-items-center text-center mt-5 ">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle bg-white " width="150">
            <span class="logo_name text-white mt-3">Boss Amo</span>
         </div>
         <ul class="nav-links">
            <li>
               <a href="seller_product.html" class="active">
                  <i class='bx bx-grid-alt'></i>
                  <span class="links_name">Product</span>
               </a>
            </li>
            <li>
               <a href="dashboard_order_product.html">
                  <i class='bx bx-grid-alt'></i>
                  <span class="links_name">Orders</span>
               </a>
            </li>
            <li>
               <a href="dashboard_pastreview_product.html">
                  <i class='bx bx-list-ul'></i>
                  <span class="links_name">Past Reviews</span>
               </a>
            </li>
            <li>
               <a href="dashboard_orderhistory_product.html">
                  <i class='bx bx-coin-stack'></i>
                  <span class="links_name">Order History</span>
               </a>
            </li>
            <li>
               <a href="dashboard_help_account.html">
                  <i class='bx bx-coin-stack'></i>
                  <span class="links_name">Settings</span>
               </a>
            </li>
            <li class="log_out">
               <a href="home.html">
                  <i class='bx bx-log-out'></i>
                  <span class="links_name">Home</span>
               </a>
            </li>
         </ul>
      </div>
      <section class="home-section">
         <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                           <a href="dashboard_order_product.html" class="nav-link active" style="padding-left: 50px;padding-right: 50px;">
                              <i class="fa-sharp fa-solid fa-house fa-sm" style="color: #000000;">&nbsp&nbsp</i>Product </a>
                        </li>
                        <li class="nav-item">
                           <a href="dashboard_order_service.html" class="nav-link active" style="padding-left: 50px;padding-right: 50px;">
                              <i class="fa-sharp fa-solid fa-house fa-sm" style="color: #000000;">&nbsp&nbsp</i>Service </a>
                        </li>
                     </ul>
                  </div>
                  <form  action=""  method="POST">
                     <input class="form-control me-2" type="search" name="searchQuery" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit">
                        <i class="fa-sharp fa-solid fa-magnifying-glass fa-sm" style="color: #000000;"></i>
                     </button>
                  </form>
               </div>
            </nav>
         </header>
         <!-- Prdduct Nav -->
         <div class="home-content">
            <ul class="nav nav-tabs px-5">
               <li class="active">
                  <a data-toggle="tab" href="#home">All</a>
               </li>
            </ul>
            <!-- All -->
            <div class="tab-content">
               <div id="home" class="tab-pane fade in active">
                  <div class="sales-boxes py-5 border-top ">
                     <div class="recent-sales box ">
                        <div>
         
                           <table class="table table-striped" style="float: right;">
                              <thead>
                                 <tr>
                                    <td style="width: 100px;">
                                       <button class="btn btn-primary"><a href="add_products.html" style="color:white;text-decoration:none;"> Add Products</a> </button>
                                       
                                 </tr>
                              </thead>
                           </table>
                        </div>
                        <!-- All -->
                        <table class="table table-striped">
                           <thead style="text-align: center;">
                              <tr style="text-align: center;">
                                 <th scope="col" class="px-5" style="text-align: center;">Product(s)</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Category</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Product ID</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Product Name</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Price</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Description</th>
                                 <th scope="col" class="px-5" style="text-align: center;">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="name" style="text-align: center;">
                              <tbody>
                                 <?php foreach ($products as $product): ?>
                                 <tr>
                                    <td class="px-5" style="width: 100px;">
                                          <img src="images/<?php echo $product['p_image']; ?>" alt="product name">
                                    </td>
                                    <td class="px-5" style="width: 150px; text-align:center"><?php echo $product['category']; ?></td>
                                    <td class="px-5" style="width: 150px; text-align:center"><?php echo $product['p_id']; ?></td>
                                    <td class="px-5" style="width: 350px; text-align:center"><?php echo $product['p_name']; ?></td>
                                    <td class="px-5" style="width: 200px; text-align:center"><?php echo "₱ " . $product['p_price']; ?></td>
                                    <td class="px-5" style="width:600px; text-align: justify;"><?php echo $product['p_desc']; ?></td>
                                    <td class="px-5" style="text-align:center">
                                          <a href="#">
                                             <button class="btn editProductBtn" style="background-color: none; outline: none;" data-toggle="modal" data-target="#editModal_<?php echo $product['p_id']; ?>"
                                                data-productid="<?php echo $product['p_id']; ?>"
                                                data-category="<?php echo $product['category']; ?>"
                                                data-productname="<?php echo $product['p_name']; ?>"
                                                data-productprice="<?php echo $product['p_price']; ?>"
                                                data-productdescription="<?php echo $product['p_desc']; ?>"
                                                data-productimage="<?php echo $product['p_image']; ?>">
                                                <span>
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" top="10" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                         <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                         <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                      </svg>
                                                </span>
                                             </button>
                                          </a>
                                          <a href="#" class="delete-button" data-productid="<?php echo $product['p_id']; ?>">
                                       <span>
                                          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="black" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                          </svg>
                                       </span>
                                    </a>
                                    </td>
                                 </tr>

                                 <!-- Edit Modal -->
                                 <div class="modal fade bd-example-modal-lg" id="editModal_<?php echo $product['p_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                          <div class="modal-content py-5 px-5">
                                             <h2 id="modalTitle">Update Product</h2>
                                             <form action="edit_product.php" method="POST" enctype="multipart/form-data">
                                             <img src="images/<?php echo $product['p_image']; ?>" alt="Product Image" style="max-width: 100%; height: auto;">
                                                <div class="mb-3">
                                                      <label for="productimage" class="form-label">Product Image</label>
                                                      <input type="file" class="form-control-file" id="productimage" name="productimage" accept="image/*">
                                                </div>
                                                <div class="mb-3">
                                                      <label for="category" class="form-label">Category</label>
                                                      <select class="form-control" style="height:38px" id="category" name="category">
                                                         <option value="Machines">Machines</option>
                                                         <option value="Tools">Tools</option>
                                                         <option value="Paints">Paints</option>
                                                         <option value="Hardware">Hardware</option>
                                                      </select>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="productid" class="form-label">Product ID</label>
                                                      <input type="text" class="form-control" id="productid" name="productid" value="<?php echo $product['p_id']; ?>" placeholder="Product ID" readonly>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="productname" class="form-label">Product Name</label>
                                                      <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $product['p_name']; ?>" placeholder="Product Name" required>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="productprice" class="form-label">Product Price</label>
                                                      <input type="number" class="form-control" id="productprice" name="productprice" value="<?php echo $product['p_price']; ?>" placeholder="Product Price" required>
                                                </div>
                                                <div class="mb-3">
                                                      <label for="productdescription" class="form-label">Product Description</label>
                                                      <textarea class="form-control" id="productdescription" name="productdescription" rows="4" placeholder="Description here..." required><?php echo $product['p_desc']; ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-warning" name="submit" id="submitBtn">Update Product</button>
                                             </form>
                                          </div>
                                    </div>
                                 </div>
                                 <?php endforeach; ?>
                              </tbody>

                              
                           </tbody>                    
                        </table>       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script>
         let sidebar = document.querySelector(".sidebar");
         let sidebarBtn = document.querySelector(".sidebarBtn");
         sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
               sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
         }
      </script>
      <script>
         //var form = document.getElementById('editForm');
         var modal = document.getElementById('editmodal');
         var form = modal.querySelector('form');

         // Get the input fields
         var categoryInput = form.querySelector('#category');
         var productIdInput = form.querySelector('#productid');
         var productNameInput = form.querySelector('#productname');
         var productPriceInput = form.querySelector('#productprice');
         var productDescriptionInput = form.querySelector('#productdescription');

         // Set the initial values of the input fields
         categoryInput.value = '<?php echo isset($product["category"]) ? $product["category"] : ""; ?>';
         productIdInput.value = '<?php echo isset($product["p_id"]) ? $product["p_id"] : ""; ?>';
         productNameInput.value = '<?php echo isset($product["p_name"]) ? $product["p_name"] : ""; ?>';
         productPriceInput.value = '<?php echo isset($product["p_price"]) ? $product["p_price"] : ""; ?>';
         productDescriptionInput.value = '<?php echo isset($product["p_desc"]) ? $product["p_desc"] : ""; ?>';

         // Add an event listener to the form submission
            form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Create a FormData object and append the form data
            var formData = new FormData(form);
            formData.append('submit', 'submit');

            // Send an AJAX request to the PHP file for editing the product
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'edit_product.php', true);
            xhr.onreadystatechange = function() {
               if (xhr.readyState === 4 && xhr.status === 200) {
                  // Handle the response from the PHP file
                  console.log(xhr.responseText);
                  // You can display a success message or perform any additional actions

                  // Reload the page after successful update
                  window.location.reload();
               }
            };
            xhr.send(formData);
            });


      </script>
      <script>
         // Get all delete buttons
         var deleteButtons = document.querySelectorAll('.delete-button');

         // Add click event listener to each delete button
         deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
               event.preventDefault();

               // Confirm the deletion
               var confirmDelete = confirm("Are you sure you want to delete this product?");

               if (confirmDelete) {
                  // Get the product ID from the data-productid attribute
                  var productId = this.getAttribute('data-productid');

                  // Create a form element
                  var form = document.createElement('form');
                  form.method = 'POST';
                  form.action = 'delete_product.php'; // Set the action URL for deleting the product

                  // Create an input field to store the product ID
                  var productIdInput = document.createElement('input');
                  productIdInput.type = 'hidden';
                  productIdInput.name = 'delete';
                  productIdInput.value = productId;

                  // Append the input field to the form
                  form.appendChild(productIdInput);

                  // Append the form to the document and submit it
                  document.body.appendChild(form);
                  form.submit();
               }
            });
         });
      </script>


   </body>
</html>