<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite(['resources/css/app.css'])

        <!--Regular Datatables CSS-->
        <link
            href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css"
            rel="stylesheet"
        />

        <!-- Select2 CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
            rel="stylesheet"
        />
        

        <title>Document</title>
    </head>
    <body class="flex flex-col min-h-screen">
        <!-- sidebar -->
        <x-sidebar></x-sidebar>
        <!-- header -->
        <x-header></x-header>
        <!-- Main Content -->
        <div>
            <div class="mt-16 md:mt-0 md:ml-64">
                <div class="p-4 md:p-8 md:pt-24 bg-gray-100">
                    <!-- content -->
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"
            defer
        ></script>

        <!-- jQuery -->
        <script
            type="text/javascript"
            src="https://code.jquery.com/jquery-3.4.1.min.js"
        ></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.tailwindcss.js"></script>

        <!-- Select2 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $("#myTable").DataTable({
                pagingType: "simple_numbers",
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show _MENU_ entries",
                },
            });

            function previewImage(event) {
                const previewContainer =
                    document.getElementById("photo-preview");
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

            document
                .getElementById("photo")
                .addEventListener("change", previewImage);

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
                        .append(
                            '<option value="" disabled selected>Select City</option>'
                        );
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
        </script>
    </body>
</html>
