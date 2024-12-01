<button type="button" class="cmnBtn btn_1 btn_bg_blue btn_small radius-5" data-bs-toggle="modal" data-bs-target="#addCountryModal">
    Add a Country
</button>

<div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row g-4">
                <div class="col-xxl-12 col-lg-12">
                    <div class="dashboard__card bg__white padding-20 radius-10">
                        <div class="d-flex justify-content-between">
                            <div class="dashboard__card__header">
                                <h4 class="dashboard__card__header__title">Add a country</h4>
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
                                            <label for="name" class="form__input__single__label">Country Name</label>
                                            <input type="text" id="name" name="name" class="form__control radius-5" placeholder="Country Name..." required>
                                            <span class="" role="alert" id="name_error"></span>
                                        </div>
                                        <div class="form__input__single">
                                            <label for="country_code" class="form__input__single__label">Country Code</label>
                                            <input type="text" id="country_code" name="code" maxlength="2" class="form__control radius-5" pattern="[A-Z]{2}" placeholder="Country code..." required>
                                            <span class="" role="alert" id="code_error"></span>
                                        </div>
                                        <div class="form__input__single">
                                            <label for="flag" class="form__input__single__label">Country Flag</label>
                                            <div class="file__input">
                                                <label class="file_browse_button" for="flag">
                                                    Browse
                                                </label>
                                                <input type="file" id="flag" name="flag" class="form__control radius-5">
                                            </div>
                                            <span class="flag" role="alert" id="flag_error"></span>
                                        </div>
                                        <div class="form__input__single">
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex justify-content-between mt-5">
                                        <div class="form__input__single">
                                            <button id="reset-form" type="button" class="resetForm form__control cmn_btn btn_small btn_bg_danger radius-5">
                                                Reset
                                            </button>
                                        </div>
                                        <div class="btn_wrapper single_input">
                                            <button type="button" class="resetForm cmn_btn btn_small btn_bg_danger radius-5" data-bs-dismiss="modal" aria-label="Close">
                                                Cancel
                                            </button>
                                            <button id="submit-store-form" type="button" class="cmn_btn btn_small radius-5" data-bs-dismiss="modal" aria-label="Close">
                                                Save Country
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

