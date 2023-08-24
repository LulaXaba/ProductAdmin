//from BING AI

document.addEventListener("DOMContentLoaded", function () {
  const massDeleteButton = document.getElementById("mass-delete-btn");
  const deleteCheckboxes = document.querySelectorAll(".delete-checkbox");

  massDeleteButton.addEventListener("click", function () {
    const selectedSkus = [];

    deleteCheckboxes.forEach((checkbox) => {
      if (checkbox.checked) {
        const sku = checkbox.value;
        if (sku) {
          selectedSkus.push(sku);
        }
      }
    });

    if (selectedSkus.length > 0) {
      if (confirm("Are you sure you want to delete the selected products?")) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "DeleteProduct.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
          if (xhr.status === 200) {
            alert(xhr.responseText);
            window.location.reload();
          } else {
            alert("Request failed: " + xhr.status);
          }
        };

        xhr.onerror = function () {
          alert("Network error");
        };

        xhr.send("skus=" + JSON.stringify(selectedSkus));
      }
    } else {
      alert("Please select products to delete.");
    }
  });
});

  // Add the displayImage function
  function displayImage() {
    const previewImage = document.getElementById("preview-image");
    const inputFile = document.getElementById("image");

    if (inputFile.files && inputFile.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = "block";
      };

      reader.readAsDataURL(inputFile.files[0]);
    }
  }

  // Get the input element with the id image
  const inputFile = document.getElementById("image");

  // Add an event listener to the input element
  inputFile.addEventListener("change", function () {
    // Call the displayImage function
    displayImage();
  });
