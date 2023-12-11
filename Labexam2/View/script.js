
$(document).ready(function() {
    fetchProducts();
  });
  

  function fetchProducts() {
    $.ajax({
      url: 'backend.php',
      type: 'POST',
      data: { action: 'getProducts' },
      success: function(response) {
        displayProducts(JSON.parse(response));
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  

  function displayProducts(products) {
    let productList = document.getElementById('product-list');
    productList.innerHTML = '';
  
    products.forEach(function(product) {
      let listItem = document.createElement('li');
      listItem.textContent = `${product.productName} - ${product.description} - $${product.price}`;
      productList.appendChild(listItem);
    });
  }
  

  function addProduct() {
    let productName = document.getElementById('productName').value;
    let description = document.getElementById('description').value;
    let price = document.getElementById('price').value;
  
    $.ajax({
      url: 'backend.php',
      type: 'POST',
      data: {
        action: 'addProduct',
        productName: productName,
        description: description,
        price: price
      },
      success: function(response) {
        alert(response);
        fetchProducts(); 
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
  