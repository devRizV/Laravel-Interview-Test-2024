<style>
/* Customize the outer container */
.select2-container {
    width: 100% !important; /* Ensure it fits within its container */
}

/* Customize the selection box */
.select2-container .select2-selection {
    border-radius: 5px;
    border: 1px solid #ccc;
    height: 38px;
    padding: 5px;
}

/* Customize the dropdown */
.select2-container .select2-dropdown {
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Customize the placeholder text */
.select2-container .select2-selection__placeholder {
    color: #6c757d;
    font-style: italic;
}

/* Customize selected items (for multi-select) */
.select2-container .select2-selection__choice {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 2px 5px;
    margin: 2px;
}

/* Customize hover or focus */
.select2-container .select2-selection:hover {
    border-color: #007bff;
}

</style>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStateModal">
    Add a state
</button>

<div class="modal fade" id="addStateModal" tabindex="-1" aria-labelledby="addStateModalLabel" aria-hidden="true" data-bs-container="body">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row g-4">
                <div class="col-xxl-12 col-lg-12">
                    <div class="dashboard__card bg__white padding-20 radius-10">
                        <div class="d-flex justify-content-between">
                            <div class="dashboard__card__header">
                                <h4 class="dashboard__card__header__title">Add a state</h4>
                            </div>
                            <div class="dashboard__card__header">
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="dashboard__card__inner mt-4">
                            <div class="form__input">
                                <form id="store-country-form" enctype="multipart/form-data">
                                    @csrf
                                    @method("POST")
                                    <div class="form__input__flex">
                                        <div class="form__input__single">
                                            <label for="name" class="form__input__single__label">State Name</label>
                                            <input type="text" id="name" name="name" class="form__control radius-5" placeholder="Country Name..." required>
                                            <span class="" role="alert" id="name_error"></span>
                                        </div>
                                        <div class="form__input__single">
                                            <label for="state_code" class="form__input__single__label">State Code</label>
                                            <input type="text" id="state_code" name="state_code" maxlength="3" class="form__control radius-5" pattern="[A-Z]{3}" placeholder="State code..." required>
                                            <span class="" role="alert" id="code_error"></span>
                                        </div>
                                        <div class="form__input__single">
                                            <div>
                                                <label for="country_name" class="form__input__single__label">Country Name</label>
                                                <select name="country_id" id="country_name" class="select2">
                                                    <option>select a country</option>
                                                    {{-- country list will be appended here. --}}
                                                </select>
                                                <span class="" role="alert" id="flag"></span>

                                                <span class="" role="alert" id="country_name_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-5">
                                        <div class="btn_wrapper single_input">
                                            <button id="reset-form" type="button" class="cmn_btn btn_small btn_bg_danger radius-5" data-bs-dismiss="modal" aria-label="Close">
                                                Cancel
                                            </button>
                                            <button id="submit-store-form" type="button" class="cmn_btn btn_small radius-5" data-bs-dismiss="modal" aria-label="Close">
                                                Save State
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
