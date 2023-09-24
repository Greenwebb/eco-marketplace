<div style="z-index: 100003;" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div style="width: 100%;margin: 0;height: 100%; background:#29444a; border-radius: 3px;" class="modal-content">

            <div class="modal-body"><button type="button" class="btn-close" style="position: fixed; right: 3.5rem;" data-bs-dismiss="modal" aria-label="Close"></button>
                <center> 
                    <main class="m-auto p-4 mw-100">
                        <div id="wizard">
                            <h3>Business</h3>
                            <section>
                                <h2 class="step-heading"> Select a business type </h2>
                                <div class="purpose-radios-wrapper">
                                    <div class="purpose-radio">
                                        <input type="radio" name="purpose" id="branding" class="purpose-radio-input"
                                            value="Branding" checked>
                                        <label for="branding" class="purpose-radio-label">
                                            <span class="label-icon">
                                                <img src="public/theme/images/1.svg" alt="branding"
                                                    class="label-icon-default">
                                                <img src="{{ asset('theme/images/1.svg') }}" alt="branding"
                                                    class="label-icon-active">
                                            </span>
                                            <span class="label-text">Farmer</span>
                                        </label>
                                    </div>
                                    <div class="purpose-radio">
                                        <input type="radio" name="purpose" id="mobile-design"
                                            class="purpose-radio-input" value="Moile Design">
                                        <label for="mobile-design" class="purpose-radio-label">
                                            <span class="label-icon">
                                                <img src="{{ asset('theme/images/2.svg') }}" alt="branding"
                                                    class="label-icon-default">
                                                <img src="{{ asset('theme/images/2.svg') }}" alt="branding"
                                                    class="label-icon-active">
                                            </span>
                                            <span class="label-text">agronomists</span>
                                        </label>
                                    </div>
                                    <div class="purpose-radio">
                                        <input type="radio" name="purpose" id="web-design" class="purpose-radio-input"
                                            value="Web Design">
                                        <label for="web-design" class="purpose-radio-label">
                                            <span class="label-icon">
                                                <img src="{{ asset('theme/images/3.svg') }}" alt="branding"
                                                    class="label-icon-default">
                                                <img src="{{ asset('theme/images/3.svg') }}" alt="branding"
                                                    class="label-icon-active">
                                            </span>
                                            <span class="label-text">Guest</span>
                                        </label>
                                    </div>
                                </div>
                            </section>
                            <h3>Personal</h3>
                            <section>
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber" class="sr-only">Phone Number</label>
                                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control"
                                        placeholder="Phone number">
                                </div>
                                <div class="form-group">
                                    <label for="location" class="sr-only">Location</label>
                                    <input type="text" name="location" id="location" class="form-control"
                                        placeholder="Location">
                                </div>
                                <div class="form-group">
                                    <label for="zipcode" class="sr-only">Zipcode</label>
                                    <input type="text" name="zipcode" id="zipcode" class="form-control"
                                        placeholder="Zipcode">
                                </div>
                            </section>
                            <h3>Bank</h3>
                            <section>
                                <div class="form-group">
                                    <label for="cardNumber" class="sr-only">card Number</label>
                                    <input type="text" name="cardNumber" id="cardNumber" class="form-control"
                                        placeholder="Card number">
                                </div>
                                <div class="form-group">
                                    <label for="expiration" class="sr-only">Expiration</label>
                                    <input type="text" name="expiration" id="expiration" class="form-control"
                                        placeholder="Expiration">
                                </div>
                                <div class="form-group">
                                    <label for="cvv" class="sr-only">CVV</label>
                                    <input type="text" name="cvv" id="cvv" class="form-control" placeholder="CVV">
                                </div>
                                <div class="form-group">
                                    <label for="nameOnCard" class="sr-only">Name on card</label>
                                    <input type="text" name="nameOnCard" id="nameOnCard" class="form-control"
                                        placeholder="Name on card">
                                </div>
                            </section>
                            <h3>Confirm</h3>
                            <section>
                                <div class="mb-4"><span class="font-weight-bold">Business selected</span> : <span
                                        id="selectedBusiness">Branding</span> </div>
                                <h6 class="font-weight-bold"> User Details</h6>
                                <p class="mb-0">Username : <span id="enteredUsername"></span> </p>
                                <p class="mb-0">Phone : <span id="enteredPhoneNumber"></span> </p>
                                <p class="mb-0">Location : <span id="enteredLocation"></span> </p>
                                <p>Zipcode : <span id="enteredZipcode"></span> </p>
                                <h6 class="font-weight-bold"> Card Details</h6>
                                <p class="mb-0">card : <span id="enteredCard"></span> </p>
                                <p class="mb-0">Card expiration : <span id="cardExpiration"></span> </p>
                                <div class="form-check mt-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="termsAgreement"
                                            id="termsAgreement" value="termsAgreed" checked>
                                        I agree to the terms and conditions
                                    </label>
                                </div>
                            </section>
                        </div>
                    </main>
                </center>

            </div>
        </div>
    </div>
</div>
<style>
    input[type="radio"] + label:before, input[type="checkbox"] + label:before, .wpcf7-list-item-label.wpcf7-list-item-right:before {
    border-color: var(--theme-color-input_bd_color) !important;
    display:none;
}
.btn-close {
    --bs-btn-close-color: #fff;
    --bs-btn-close-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e);
 
    color: #f9f4f4;
    background: white var(--bs-btn-close-bg) center/1em auto no-repeat;
    border: 0;
    border-radius: 0.375rem;
    opacity: var(--bs-btn-close-opacity);}

</style>