$(document).ready(function () {
  // When an option is selected in listA
  $("#select_bacsi").change(function () {
    // Get the selected value of listA
    var selectedValue = $(this).val();
    console.log("selected value:", selectedValue);
    // Make an AJAX request to the PHP API to get data based on the selected value of listA
    $.ajax({
      url: "index.php?action=get-cuoc-hen-by-doctor",
      type: "POST",
      data: {
        selectedValue: selectedValue,
      },
      success: function (data) {
        // Clear the existing options from listB
        $("#select_cuochen").empty();
        // Add new options to listB based on the data returned from the PHP API
        $.each(data, function (index, element) {
          $("#select_cuochen").append(
            "<option value='" +
              element.value +
              "'>" +
              element.label +
              "</option>"
          );
        });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error: " + textStatus + " - " + errorThrown);
      },
    });
  });
});
