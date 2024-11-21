        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="row g-4">
                    <div class="col-xxl-12 col-lg-12">
                        <div class="dashboard__card bg__white padding-20 radius-10">
                            <div class="d-flex justify-content-between">
                                <div class="dashboard__card__header">
                                    <h4 class="dashboard__card__header__title">Edit a state</h4>
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
                                                <input type="text" id="name" name="name" class="form__control radius-5" placeholder="Country Name..." value="${state.name}" required>
                                                <span class="" role="alert" id="name_error"></span>
                                            </div>
                                            <div class="form__input__single">
                                                <label for="state_code" class="form__input__single__label">State Code</label>
                                                <input type="text" id="state_code" name="state_code" maxlength="3" class="form__control radius-5" pattern="[A-Z]{3}" placeholder="State code..." value="${state.state_code}" required>
                                                <span class="" role="alert" id="code_error"></span>
                                            </div>
                                            <div class="form__input__single">
                                                <div>
                                                    <label for="country_name_update" class="form__input__single__label">Country Name</label>
                                                    <select name="country_id" id="country_name_update" class="select2_update" data-select="${state.country.id}">
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
