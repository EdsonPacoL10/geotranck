"use strict";
var KTAuthResetPassword = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_password_reset_form")),
                (e = document.querySelector("#kt_password_reset_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: { email: { validators: { regexp: { regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: "El correo electronico ingresado no es valido" }, notEmpty: { message: "El correo electronico es necesario" } } } },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                e.addEventListener("click", function (r) {
                    r.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                  (e.disabled = !0),
                                  setTimeout(function () {
                                      e.removeAttribute("data-kt-indicator"),
                                          (e.disabled = !1),
                                          Swal.fire({
                                              text: "Hemos enviado un enlace para restablecer la contraseña a su correo electrónico.",
                                              icon: "success",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Aceptar!",
                                              customClass: { confirmButton: "btn btn-primary" },
                                          }).then(function (e) {
                                              if (e.isConfirmed) {
                                                  t.querySelector('[name="email"]').value = "";
                                                  var i = t.getAttribute("data-kt-redirect-url");
                                                  i && (location.href = i);
                                              }
                                          });
                                  }, 1500))
                                : Swal.fire({
                                      text: "Perdon. Al parecer susito un problema revise su informacion e intente nuevamente",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Aceptar!",
                                      customClass: { confirmButton: "btn btn-primary" },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAuthResetPassword.init();
});
