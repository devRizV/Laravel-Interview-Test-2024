@extends('layouts.app')

@section('content')
        <div class="dashboard__body">
            <div class="" id="show-message">
                {{-- message shown here --}}
            </div>
            <div id="add-country-section" class="absolute">
                <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
                    <div class="d-flex justify-content-between">
                        <h4 class="dashboard__inner__item__header__title">Country List</h4>
                        @include('country.store-country')
                    </div>
                     <!-- Table Design One -->
                    <div class="tableStyle_one mt-4">
                        <div class="table_wrapper">
                            <!-- Table -->
                            <table id="countries-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Country Name</th>
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
                let sortBy = "created_at";
                let sortOrder = "desc";

                fetchCountries();
                resetForm('.resetForm');
                function fetchCountries(page = 1) {
                    const url = `/api/v1/countries`;
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            paginate: false,
                            page: page,
                            sort_by: sortBy,
                            sortOrder: sortOrder,
                        },
                        dataType: "json",
                        success: function (response) {
                            populateTable(response.data);
                            table = $('#countries-table').DataTable();
                        },
                        error: function (xhr) {

                        }
                    });
                }



                function populateTable(countries) {
                    const tbody = $("#countries-table tbody");
                    tbody.empty(); // Clear previous content

                    countries.forEach((country, index) => {
                        tbody.append(`
                            <tr>
                                <td>${index+1}</td>
                                <td>${country.name}</td>
                                <td>${country.slug}</td>
                                <td>${country.code}</td>
                                <td class="productWrap d-flex align-items-center"><img src="{{asset('storage/${country.flag}')}}" alt="${country.flag} flag"></td>
                                <td>
                                    <div class="action__icon d-flex justify-content-between">
                                        <div class="action__icon__item">
                                            <button class="icon openEditModal" data-country='${JSON.stringify(country)}'>
                                                <i class="material-symbols-outlined">edit</i>
                                            </button>
                                        </div>
                                        <div class="action__icon__item">
                                            <button class="icon delete-country-btn" data-id='${country.id}'>
                                                <i class="material-symbols-outlined">delete</i></a>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                }

                function resetForm(resetButton) {
                    $(document).on('click', resetButton, function () {
                        const form = $(this).closest('form')[0];
                        form.reset();
                    });
                }
                
                // Handle form submission
                $('#submit-store-form').on('click', function (e) {
                    e.preventDefault();
                    const $this = $(this);
                    const form  = $this.closest('form')[0];
                    const formData = new FormData(form);
                    $('.form__control').removeClass('is-invalid');
                    $('.error-message').remove();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('countries.store') }}",
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            handleMessage(response.status, response.message);
                            form.reset(); // Reset the form
                            const modalElement = document.getElementById('editModal');
                            const modal = new bootstrap.Modal(modalElement);
                            modal.hide();
                            fetchCountries();
                        },
                        error: function (xhr, status, error) {
                            handleMessage(status, error);
                            if (xhr.status === 422) {
                                // Validation errors
                                let errors = xhr.responseJSON.errors;

                                for (let field in errors) {
                                    let input = $(`[name="${field}"]`);
                                    input.addClass('is-invalid');
                                    input.after(`<span class="error-message alert alert-danger">${errors[field][0]}</span>`);
                                }
                            } else {
                                handleMessage(status, xhr.responseJSON.message);
                            }
                        }
                    });
                });
                function requestValidation(country) {
                    if (!country.name.length > 0) {
                        $('#name_error').append("Country name field cannot be empty!!");
                        return
                    } else if (!country.code.length > 0 || country.code.length < 2 || country.code.length > 2) {
                        $('#code_error').append("Country code field cannot be empty!!");
                    }
                }
                function handleMessage(status, message) {
                    const showError = $("#show-message");
                    showError.empty();
                    if (status === "error") {
                        showError.addClass('alert alert-danger').append(message);
                    } else if (status === "success") {
                        showError.addClass('alert alert-success').append(message);
                    }
                }

                $(document).on("click", ".openEditModal", function () {
                    const country = $(this).data('country');
                    openEditModal(country);
                });

                function openEditModal(country) {
                    const editForm = `@include('country.edit-country')`;
                    $("#editModal").empty().append(editForm);
                    const modalElement = document.getElementById('editModal');
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                }

                $(document).on('click', '#submit-update-form', function (e) {
                    e.preventDefault();
                    const $this = $(this);
                    const form  = $this.closest('form')[0];
                    const formData = new FormData(form);

                    const id = formData.get('id');
                    const url = `countries/${id}`;

                    $('.form__control').removeClass('is-invalid');
                    $('.error-message').remove();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            handleMessage(response.status, response.message);
                            fetchCountries();
                        },
                        error: function (xhr, status, error) {
                            handleMessage(status, error);
                            const modalElement = document.getElementById('editModal');
                            const modal = new bootstrap.Modal(modalElement);
                            modal.hide();
                            if (xhr.status === 422) {
                                // Validation errors
                                let errors = xhr.responseJSON.errors;

                                for (let field in errors) {
                                    let input = $(`[name="${field}"]`);
                                    input.addClass('is-invalid');
                                    input.after(`<span class="error-message alert alert-danger">${errors[field][0]}</span>`);
                                }
                            } else {
                                handleMessage(status, xhr.responseJSON.message);
                            }
                        }
                    });
                });

                $(document).on('click', '.delete-country-btn', function () {
                    const $this = $(this);
                    const id = $this.data('id');
                    const url = `{{ route('countries.destroy', '__id__') }}`.replace('__id__', id);
                    let shouldProceed = confirm("Do you want to delete this country");

                    if (shouldProceed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "DELETE",
                            url: url,
                            dataType: "json",
                            success: function (response) {
                                handleMessage(response.status, response.message);
                                fetchCountries();
                            },
                            error: function (xhr, status, error) {
                                handleMessage(status, error);

                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;

                                    for (let field in errors) {
                                        let input = $(`[name="${field}"]`);
                                        input.addClass('is-invalid');
                                        input.after(`<span class="error-message alert alert-danger">${errors[field][0]}</span>`);
                                    }
                                } else {
                                    handleMessage(status, xhr.responseJSON.message);
                                }
                            }
                        });
                    }   else {
                            handleMessage("success", "Country was not deleted. Action cancelled.")
                        }
                });

            });
            
            let table = new DataTable('#dataTable', {});
        </script>

        

@endsection
