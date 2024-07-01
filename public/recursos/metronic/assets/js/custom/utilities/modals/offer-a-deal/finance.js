"use strict";
var KTModalOfferADealFinance = (function () {
    var stepperObj, btnNext, btnPrevious;

    return {
        init: function () {
            stepperObj = KTModalOfferADeal.getStepperObj();
            btnNext = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-next"]');
            btnPrevious = KTModalOfferADeal.getStepper().querySelector('[data-kt-element="finance-previous"]');

            btnNext.addEventListener("click", function (event) {
                event.preventDefault();
                // Aquí puedes agregar cualquier lógica adicional antes de avanzar al siguiente paso
                KTUtil.addClass(btnNext, "spinner spinner-white spinner-right");

                setTimeout(function () {
                    KTUtil.removeClass(btnNext, "spinner spinner-white spinner-right");
                    btnNext.removeAttribute("data-kt-indicator");
                    btnNext.disabled = false;
                    btnPrevious.disabled = false;
                    stepperObj.goNext();
                }, 100);
            });

            btnPrevious.addEventListener("click", function (event) {
                event.preventDefault();
                // Aquí puedes agregar cualquier lógica adicional antes de retroceder al paso anterior
                KTUtil.addClass(btnPrevious, "spinner spinner-white spinner-right");

                setTimeout(function () {
                    KTUtil.removeClass(btnPrevious, "spinner spinner-white spinner-right");
                    btnPrevious.removeAttribute("data-kt-indicator");
                    btnNext.disabled = false;
                    btnPrevious.disabled = false;
                    stepperObj.goPrevious();
                }, 100);
            });
        },
    };
})();

"undefined" != typeof module && void 0 !== module.exports && (window.KTModalOfferADealFinance = module.exports = KTModalOfferADealFinance);
