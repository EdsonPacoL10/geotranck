"use strict";

var KTUsersUpdatePermissions = (function () {
    const t = document.getElementById("kt_modal_update_role"),
        e = t.querySelector("#kt_modal_update_role_form"),
        n = new bootstrap.Modal(t);

    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: { role_name: { validators: { notEmpty: { message: "Role name is required" } } } },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                });

                t.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", (t) => {
                    t.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to close?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, close it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                    }).then(function (t) {
                        if (t.value) {
                            n.hide();
                        }
                    });
                });

                t.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", (t) => {
                    t.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                    }).then(function (t) {
                        if (t.value) {
                            e.reset();
                            n.hide();
                        } else if (t.dismiss === "cancel") {
                            Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: false, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                        }
                    });
                });

                const i = t.querySelector('[data-kt-roles-modal-action="submit"]');
                i.addEventListener("click", function (e) {
                    e.preventDefault();

                    o && o.validate().then(function (isValid) {
                        if (isValid === 'Valid') {
                            const formData = new FormData(e.target.closest('form'));

                            $.ajax({
                                url: '/agudddp',
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    i.setAttribute("data-kt-indicator", "on");
                                    i.disabled = true;
                                    setTimeout(function () {
                                        i.removeAttribute("data-kt-indicator");
                                        i.disabled = false;
                                        Swal.fire({ text: "Form has been successfully submitted!", icon: "success", buttonsStyling: false, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(
                                            function (result) {
                                                if (result.isConfirmed) {
                                                    n.hide();
                                                }
                                            }
                                        );
                                    }, 2000);
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({
                                        text: "Sorry, looks like there was an error, please try again.",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                }
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                });
            })(),
                (() => {
                    const t = e.querySelector("#kt_roles_select_all"),
                        n = e.querySelectorAll('[type="checkbox"]');
                    t.addEventListener("change", (t) => {
                        n.forEach((e) => {
                            e.checked = t.target.checked;
                        });
                    });
                })();
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePermissions.init();
});
