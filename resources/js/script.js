// new DataTable("#myTable");
$("#myTable").DataTable();


function previewImage(event) {
    const previewContainer = document.getElementById("photo-preview");
    const preview = document.getElementById("imagePreview");
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onloadend = function () {
        const img = document.createElement("img");
        img.src = reader.result;
        img.className = "max-w-xs rounded-lg shadow-md";
        previewContainer.innerHTML = ""; // Clear existing preview
        previewContainer.appendChild(img);

        preview.src = reader.result;
        preview.classList.remove("hidden");
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.classList.add("hidden");
        previewContainer.innerHTML = ""; // Clear existing preview
    }
}

document.getElementById("photo").addEventListener("change", previewImage);

$(document).ready(function () {
    $(".js-example-basic-single").select2({
        theme: "classic",
        placeholder: "Select an option",
        allowClear: true,
        width: "resolve",
    });

    const provinceSelect = $("#province");
    const citySelect = $("#city");
    const districtSelect = $("#district");
    const subdistrictSelect = $("#subdistrict");

    // Fetch provinces
    $.getJSON(
        "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
        function (provinces) {
            provinces.forEach(function (province) {
                const option = new Option(
                    province.name,
                    province.id, // Menggunakan ID provinsi sebagai value
                    false,
                    false
                );
                provinceSelect.append(option);
            });
            provinceSelect.trigger("change.select2");
        }
    );

    // Fetch cities based on selected province
    provinceSelect.on("change", function () {
        const provinceId = $(this).val();
        citySelect
            .empty()
            .append('<option value="" disabled selected>Select City</option>');
        districtSelect
            .empty()
            .append(
                '<option value="" disabled selected>Select District</option>'
            );
        subdistrictSelect
            .empty()
            .append(
                '<option value="" disabled selected>Select Subdistrict</option>'
            );
        $.getJSON(
            `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`,
            function (cities) {
                cities.forEach(function (city) {
                    const option = new Option(
                        city.name,
                        city.id, // Menggunakan ID kota sebagai value
                        false,
                        false
                    );
                    citySelect.append(option);
                });
                citySelect.trigger("change.select2");
            }
        );
    });

    // Fetch districts based on selected city
    citySelect.on("change", function () {
        const cityId = $(this).val();
        districtSelect
            .empty()
            .append(
                '<option value="" disabled selected>Select District</option>'
            );
        subdistrictSelect
            .empty()
            .append(
                '<option value="" disabled selected>Select Subdistrict</option>'
            );
        $.getJSON(
            `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${cityId}.json`,
            function (districts) {
                districts.forEach(function (district) {
                    const option = new Option(
                        district.name,
                        district.id, // Menggunakan ID distrik sebagai value
                        false,
                        false
                    );
                    districtSelect.append(option);
                });
                districtSelect.trigger("change.select2");
            }
        );
    });

    // Fetch subdistricts based on selected district
    districtSelect.on("change", function () {
        const districtId = $(this).val();
        subdistrictSelect
            .empty()
            .append(
                '<option value="" disabled selected>Select Subdistrict</option>'
            );
        $.getJSON(
            `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`,
            function (subdistricts) {
                subdistricts.forEach(function (subdistrict) {
                    const option = new Option(
                        subdistrict.name,
                        subdistrict.id, // Menggunakan ID subdistrict sebagai value
                        false,
                        false
                    );
                    subdistrictSelect.append(option);
                });
                subdistrictSelect.trigger("change.select2");
            }
        );
    });
});
