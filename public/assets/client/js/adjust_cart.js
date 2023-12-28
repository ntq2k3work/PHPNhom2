
function addQuantity(product_id) {
    var quantity = 1; // Biến số lượng toàn cục
  
    // Gửi yêu cầu Ajax
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/public/assets/client/js/calculate_total.php", true);
  
    // Xử lý phản hồi từ máy chủ
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var quantityInput = document.getElementById("quantityInput");
          quantityInput.value = xhr.responseText; // Cập nhật giá trị số lượng trong input
        } else {
          alert("Đã xảy ra lỗi: " + xhr.status);
        }
      }
    };
  
    // Gửi dữ liệu
    var formData = new FormData();
    formData.append("product_id", product_id);
    formData.append("quantity", quantity);
    xhr.send(formData);
  }
  
  function subtractQuantity(product_id) {
    var quantity = -1; // Biến số lượng toàn cục
  
    // Gửi yêu cầu Ajax
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/public/assets/client/js/calculate_total.phpx", true);
  
    // Xử lý phản hồi từ máy chủ
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var quantityInput = document.getElementById("quantityInput");
          quantityInput.value = xhr.responseText; // Cập nhật giá trị số lượng trong input
        } else {
          alert("Đã xảy ra lỗi: " + xhr.status);
        }
      }
    };
  
    // Gửi dữ liệu
    var formData = new FormData();
    formData.append("product_id", product_id);
    formData.append("quantity", quantity);
    xhr.send(formData);
  }
  