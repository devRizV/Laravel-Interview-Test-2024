@extends('layouts.app')

@section('content')


    <div class="alert alert-success" id="show-message">
        {{-- message shown here --}}
    </div>
        
        <div class="dashboard__body">
            <div id="add-country-section" class="absolute">
                <div class="dashboard__inner">
                @include('country.store-country')
            </div>
                <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
                    <h4 class="dashboard__inner__item__header__title">Country List</h4>
                     <!-- Table Design One -->
                    <div class="tableStyle_one mt-4">
                        <div class="table_wrapper">
                            <!-- Table -->
                            <table id="countries-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Country Name 
                                        </span>
                                        </th>
                                        <th>Country Slug</th>
                                        <th>Country Code</th>
                                        <th>Country Flag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Country list will be appended here. --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End-of Table one -->
                    <div id="pagination" class="d-flex justify-content-center mt-4">
                        {{-- pagination links here --}}
                    </div>
                </div>
            </div>
        </div>

        <script type="module">
            $(document).ready(function () {
                let currentPage = 1;
                let sortBy = "name";
                let sortOrder = "asc";

                fetchCountries();

                function fetchCountries(page = 1) {
                    const url = `/api/v1/countries`;
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            paginate: true,
                            page: page,
                            sort_by: sortBy,
                            sortOrder: sortOrder,
                        },
                        dataType: "json",
                        success: function (response) {                            
                            populateTable(response.data);
                            setupPagination(response.meta);
                        },
                        error: function (xhr) { 

                        }
                    });
                }      
                
                function populateTable(countries) {
                    const tbody = $("#countries-table tbody");
                    tbody.empty(); // Clear previous content
                    countries.forEach((country, index) => {
                        index = 
                        tbody.append(`
                            <tr>
                                <td>${index+1}</td>
                                <td>${country.name}</td>
                                <td>${country.slug}</td>
                                <td>${country.code}</td>
                                <td class="productWrap d-flex align-items-center"><img src="{{asset('storage/${country.flag}')}}" alt="${country.flag} flag"></td>
                                <td>
                                    <!-- DropDown -->
                                    <div class="dropdown custom__dropdown">
                                        <button class="dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="las la-ellipsis-h"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                }

                 // Setup pagination links
                function setupPagination(meta) {
                    const pagination = $("#pagination");
                    pagination.empty(); // Clear previous links
                    for (let i = 1; i <= meta.last_page; i++) {
                        pagination.append(`
                            <button class="page-btn cmn_btn btn_small radius-5 m-1" data-page="${i}">
                                <span>${i === meta.current_page ? `<strong>${i}</strong>` : i}</span>
                            </button>
                        `);
                    }
                }
                // Event handler for pagination buttons
                $(document).on("click", ".page-btn", function () {
                    currentPage = $(this).data("page");
                    console.log(currentPage);
                    
                    fetchCountries(currentPage);
                });

                // Handle form submission
                $('#submit-btn').on('click', function (e) {
                    e.preventDefault(); 
                    let formData = new FormData($('#store-country-form')[0]);

                    console.log(formData);
                    
                    $('.form__control').removeClass('is-invalid');
                    $('.error-message').remove();
                    $.ajax({
                        url: "/countries", // Replace with your actual route
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $("#show-message").append(response.message);
                            $('#store-country-form')[0].reset(); // Reset the form
                            fetchCountries();
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) {
                                // Validation errors
                                let errors = xhr.responseJSON.errors;

                                // Loop through errors and display them
                                for (let field in errors) {
                                    let input = $(`[name="${field}"]`);
                                    input.addClass('is-invalid');
                                    input.after(`<span class="error-message text-danger">${errors[field][0]}</span>`);
                                }
                            } else {
                                // Handle other errors
                                alert('An unexpected error occurred. Please try again.');
                            }
                        }
                    });
                });

            });    
        </script>

@endsection