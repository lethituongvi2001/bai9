$(document).ready(function () {
  // When an option is selected in listA
  $("#select_bacsi").change(function () {
    // Get the selected value of listA
    var selectedValue = $(this).val();
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

$(document).ready(function () {
  $("#select_province").change(function () {
    var provinceId = $(this).val();
    if (provinceId) {
      $.ajax({
        url: "?action=get-district-by-city",
        type: "post",
        data: { province_id: provinceId },
        dataType: "json",
        success: function (response) {
          $("#select_district").empty();
          $("#select_district").append(
            '<option value="" selected disabled>Chọn quận / huyện</option>'
          );
          $.each(response, function (index, data) {
            $("#select_district").append(
              '<option value="' + data.maqh + '">' + data.name + "</option>"
            );
          });
        },
      });
    } else {
      $("#select_district").empty();
      $("#select_district").append(
        '<option value="" selected disabled>Chọn quận / huyện</option>'
      );
      $("#select_ward").empty();
      $("#select_ward").append(
        '<option value="" selected disabled>Chọn phường / xã</option>'
      );
    }
  });

  $("#select_district").change(function () {
    var districtId = $(this).val();
    if (districtId) {
      $.ajax({
        url: "?action=get-ward-by-district",
        type: "post",
        data: { district_id: districtId },
        dataType: "json",
        success: function (response) {
          $("#select_ward").empty();
          $("#select_ward").append(
            '<option value="" selected disabled>Chọn phường / xã</option>'
          );
          $.each(response, function (index, data) {
            $("#select_ward").append(
              '<option value="' + data.xaid + '">' + data.name + "</option>"
            );
          });
        },
      });
    } else {
      $("#select_ward").empty();
      $("#select_ward").append(
        '<option value="" selected disabled>Chọn phường / xã</option>'
      );
    }
  });
});

$(document).ready(function () {
  // Preview selected image
  $("#inputFile").change(function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewImg").attr("src", e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
    }
  });
});
