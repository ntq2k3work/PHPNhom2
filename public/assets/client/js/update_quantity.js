var quantityInput = document.getElementById("quantityInput");
if(quantityInput){
    quantityInput.addEventListener("input", function() {
      var quantity = parseInt(quantityInput.value);
    
      // Gửi yêu cầu Ajax khi giá trị số lượng thay đổi
      updateQuantity(quantity);
    });
    
    function updateQuantity(quantity) {
      // Gửi yêu cầu Ajax
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "/public/assets/client/js/add_quantity.php", true);
    
      // Xử lý phản hồi từ máy chủ
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Không cần cập nhật giá trị số lượng trong input tại đây,
            // vì giá trị đã được cập nhật ở phía máy chủ
          } else {
            alert("Đã xảy ra lỗi: " + xhr.status);
          }
        }
      };
    
      // Gửi dữ liệu
      var formData = new FormData();
      formData.append("quantity", quantity);
      xhr.send(formData);
    }
}