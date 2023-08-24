// LASTEST DELETE CODE, DOES'NT WORK AT ALL

//  document.addEventListener("DOMContentLoaded", function () {
//     const massDeleteButton = document.getElementById("mass-delete-btn");
//     const deleteCheckboxes = document.querySelectorAll(".delete-checkbox");

//     massDeleteButton.addEventListener("click", function () {
//         const selectedCards = [];

//         deleteCheckboxes.forEach((checkbox) => {
//             if (checkbox.checked) {
//                 const card = checkbox.closest(".card");
//                 if (card) {
//                     selectedCards.push(card);
//                 }
//             }
//         });

//         if (selectedCards.length > 0) {
//             if (confirm("Are you sure you want to delete the selected products?")) {
//                 selectedCards.forEach((card) => {
//                     card.remove();
//                     // Implement AJAX logic to delete the product on the server using SKU
//                 });
//                 alert("Products deleted successfully!");
//             }
//         } else {
//             alert("Please select products to delete.");
//         }
//     });
// });



// useless

// document.addEventListener("DOMContentLoaded", function () {
//   const massDeleteButton = document.getElementById("mass-delete-btn");
//   const deleteCheckboxes = document.querySelectorAll(".delete-checkbox");

//   massDeleteButton.addEventListener("click", function () {
//       const selectedSKUs = [];

//       deleteCheckboxes.forEach((checkbox) => {
//           if (checkbox.checked) {
//               selectedSKUs.push(checkbox.value);
//           }
//       });

//       if (selectedSKUs.length > 0) {
//           if (confirm("Are you sure you want to delete the selected products?")) {
//               // Send an AJAX request to your delete_products.php script
//               // Implement the server-side logic to delete products using the selected SKUs
//               // You can use a fetch() or XMLHttpRequest here
//               alert("Products deleted successfully!");
//           }
//       } else {
//           alert("Please select products to delete.");
//       }
//   });
// });




// document.addEventListener("DOMContentLoaded", function () {
// const massDeleteButton = document.getElementById("mass-delete-btn");
// const deleteCheckboxes = document.querySelectorAll(".delete-checkbox");

// massDeleteButton.addEventListener("click", function () {
// const selectedCards = [];

// deleteCheckboxes.forEach((checkbox) => {
// if (checkbox.checked) {
// const card = checkbox.closest(".card");
// if (card) {
// selectedCards.push(card);
// }
// }
// });

// if (selectedCards.length > 0) {
// if (confirm("Are you sure you want to delete the selected products?")) {
// selectedCards.forEach((card) => {
// card.remove();
// // Implement AJAX logic to delete the product on the server using SKU
// });
// alert("Products deleted successfully!");
// }
// } else {
// alert("Please select products to delete.");
// }
// });
// });

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

