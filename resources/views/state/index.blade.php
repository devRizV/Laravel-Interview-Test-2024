@extends('layouts.app')

@section('content')
        
        <div class="dashboard__body">
            <div class="" id="show-message">
                {{-- Status message shown here --}}
            </div>
            <div id="add-state-section">
                <div class="dashboard__inner__item dashboard__card bg__white padding-20 radius-10">
                    <div class="d-flex justify-content-between">
                        <h4 class="dashboard__inner__item__header__title">State List</h4>
                        @include('state.store-state')
                    </div>
                     <!-- Table Design One -->
                    <div class="">
                        <div class="table_wrapper">
                            <!-- Table -->
                            <table id="states-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>State Name</th>
                                        <th>State Slug</th>
                                        <th>State Code</th>
                                        <th>Country Name</th>
                                        <th>Country Flag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- State list will be appended here. --}}
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
                let countryData = [];
                
                fetchStates();
                fetchCountryData($("#country_name"));
                resetForm(".resetForm");

                function fetchStates(page = 1) {
                    const url = `/api/v1/states`;
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
                            $('#states-table').DataTable();
                        }
                    });
                }

                function populateTable(states) {
                    const tbody = $("#states-table tbody");
                    tbody.empty(); // Clear previous content
                    states.forEach((state, index) => {
                        tbody.append(`
                            <tr>
                                <td>${index+1}</td>
                                <td>${state.name}</td>
                                <td>${state.slug}</td>
                                <td>${state.state_code}</td>
                                <td>${state.country.name}</td>
                                <td class="productWrap d-flex align-items-center"><img src="{{asset('storage/${state.country.flag}')}}" alt="${state.country.flag} flag"></td>
                                <td>
                                    <div class="action__icon d-flex justify-content-between">
                                        <div class="action__icon__item">
                                            <button class="icon openEditModal" data-state='${JSON.stringify(state)}'>
                                                <i class="material-symbols-outlined">edit</i>
                                            </button>
                                        </div>
                                        <div class="action__icon__item">
                                            <button class="icon delete-state-btn" data-id='${state.id}'>
                                                <i class="material-symbols-outlined">delete</i></a>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `);
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
                        url: "{{ route('states.store') }}",
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            handleStatusMessage(response.status, response.message);
                            form.reset(); // Reset the form
                            $("#flag").empty();
                            $('.close').click();
                            $('#editModal').modal('hide');
                            fetchStates();
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
                                handleStatusMessage(status, xhr.responseJSON.message);
                            }
                        }
                    });
                });
                function requestValidation(state) {
                    if (!state.name.length > 0) {
                        $('#name_error').append("State name field cannot be empty!!");
                        return
                    } else if (!state.code.length > 0 || state.code.length < 3 || state.code.length > 3) {
                        $('#code_error').append("State code field cannot be empty!!");
                    }
                }
                function handleStatusMessage(status, message) {
                    const showError = $("#show-message");
                    showError.empty();
                    if (status === "error") {
                        showError.addClass('alert alert-danger').append(message);
                    } else if (status === "success") {
                        showError.addClass('alert alert-success').append(message);
                    }
                }

                $(document).on("click", ".openEditModal", function () {
                    const state = $(this).data('state');
                    openEditModal(state);
                    fetchCountryData($("#country_name_update"));
                    initSelect2($(".select2_update"));
                });

                function openEditModal(state) {
                    const editForm = `@include('state.edit-state')`;
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
                    const url = `state/${id}`;

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
                            $('.close').click();
                            fetchStates();
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

                $(document).on('click', '.delete-state-btn', function () {
                    const $this = $(this);
                    const id = $this.data('id');
                    const url = `{{ route('states.destroy', '__id__') }}`.replace('__id__', id);
                    let shouldProceed = confirm("Do you want to delete this state");

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
                                fetchStates();
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
                            handleMessage("success", "State was not deleted. Action cancelled.")
                        }
                });

                function fetchCountryData(element) {
                    const url = `/api/v1/countries`;
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {
                            paginate: false,
                        },
                        dataType: "json",
                        success: function (response) {
                            countryData = response.data;
                            populateCountryOptions(countryData, element);
                        }
                    });
                }

                function populateCountryOptions(countries, element) {
                    countries.forEach(country => {
                        const selected =  element.data('selected') == country.id;
                        element.append(`
                            <option value="${country.id}" ${selected ? 'selected' : '' }>${country.name}</option>
                        `);
                        if (selected) {
                            $('.flag').empty().append(`<img src="{{asset('storage/${country.flag}')}}" alt="${country.flag} flag">`);
                        }
                    });
                }

                toggleCountryFlag('#country_name');
                toggleCountryFlag('#country_name_update');

                function toggleCountryFlag(button) {
                    $(document).on('change', button, function () {
                        const id = $(this).val();
                        const flag = $(".flag");
    
                        countryData.forEach((country, index) => {
                            if (country.id == id) {
                                flag.empty().append(`<img src="{{asset('storage/${country.flag}')}}" alt="${country.flag} flag">`);
                            }
                        });
                    });
                }

            });
        </script>

@endsection
