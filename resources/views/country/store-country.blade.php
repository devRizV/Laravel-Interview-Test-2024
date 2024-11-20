<div class="row g-4">
    <div class="col-xxl-6 col-lg-12">
        <div class="dashboard__card bg__white padding-20 radius-10">
            <div class="dashboard__card__header">
                <h4 class="dashboard__card__header__title">Add a country</h4>
            </div>
            <div class="dashboard__card__inner mt-4">
                <div class="form__input">
                    <form id="store-coutnry-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form__input__flex">
                            <div class="form__input__single">
                                <label for="name" class="form__input__single__label">Country Name</label>
                                <input type="text" id="name" name="name" class="form__control radius-5" placeholder="Country Name..." required>
                                <span class="" role="alert" id="name_error"></span>
                            </div>
                            <div class="form__input__single">
                                <label for="country_code" class="form__input__single__label">Country Code</label>
                                <input type="text" id="country_code" name="code" maxlength="2" class="form__control radius-5" pattern="[A-Z]{2}" placeholder="Coutnry code..." required>
                                <span class="" role="alert" id="code_error"></span>
                            </div>
                            <div class="form__input__single">
                                <label for="flag" class="form__input__single__label">Country Flag</label>
                                <input type="file" id="flag" name="flag" class="form__control radius-5">
                                <span class="" role="alert" id="flag_error"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <div class="btn_wrapper single_input">
                                <button id="reset" type="button" class="cmn_btn btn_small btn_bg_danger radius-5" >
                                    Reset
                                </button>
                                <button id="submit-btn" type="button" class="cmn_btn btn_small radius-5">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>