<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="row g-4">
            <div class="col-xxl-12 col-lg-12">
                <div class="dashboard__card bg__white padding-20 radius-10">
                    <div class="d-flex justify-content-between">
                        <div class="dashboard__card__header">
                            <h4 class="dashboard__card__header__title">Edit a country</h4>
                        </div>
                        <div class="dashboard__card__header">
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="dashboard__card__inner mt-4">
                        <div class="form__input">
                            <form id="update-country-form" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="id" value="${country.id}">
                                <div class="form__input__flex">
                                    <div class="form__input__single">
                                        <label for="name" class="form__input__single__label">Country Name</label>
                                        <input type="text" id="name" name="name" class="form__control radius-5" placeholder="Country Name..." value="${country.name}" required>
                                        <span class="" role="alert" id="name_error"></span>
                                    </div>
                                    <div class="form__input__single">
                                        <label for="country_code" class="form__input__single__label">Country Code</label>
                                        <input type="text" id="country_code" name="code" maxlength="2" class="form__control radius-5" pattern="[A-Z]{2}" placeholder="Country code..." value="${country.code}" required>
                                        <span class="" role="alert" id="code_error"></span>
                                    </div>
                                    <div class="form__input__single">
                                        <label for="flag" class="form__input__single__label">Country Flag</label>
                                        <input type="file" id="flag" name="flag" class="form__control radius-5">
                                        <img src="{{ asset('storage/${country.flag}') }}" alt="${country.code}" id="flag-preview" class="productWrap d-flex align-items-center">
                                        <span class="" role="alert" id="flag_error"></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                    <div class="form__input__single">
                                        <button id="reset-form" type="button" class="resetForm form__control cmn_btn btn_small btn_bg_danger radius-5">
                                            Reset
                                        </button>
                                    </div>
                                    <div class="btn_wrapper single_input">
                                        <button id="reset-form" type="button" class="resetForm cmn_btn btn_small btn_bg_danger radius-5" data-bs-dismiss="modal" aria-label="Close">
                                            Cancel
                                        </button>
                                        <button id="submit-update-form" type="button" class="cmn_btn btn_small radius-5" data-bs-dismiss="modal" aria-label="Close">
                                            Update Country
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


