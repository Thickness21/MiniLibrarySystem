var user_update_form = document.getElementById("user_update_form"),
    user_destroy_form = document.getElementById("user_destroy_form"),
    btn_group = document.getElementById("btn_group"),
    btn_delete = document.getElementById("btn_delete"),
    btn_discard = document.getElementById("btn_discard");

user_update_form.addEventListener("input",e => {
    e.preventDefault();

    btn_group.classList.remove("visually-hidden");
    btn_delete.classList.add("visually-hidden");
});

btn_discard.addEventListener("click", function() {
    
    btn_group.classList.add("visually-hidden");
    btn_delete.classList.remove("visually-hidden");
});

user_destroy_form.addEventListener('submit', e => {
    e.preventDefault();

    Swal.fire({
        text: "Are you sure you want to delete this user?",
        icon: "warning",
        showCancelButton: !0,
        buttonsStyling: !1,
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then((function(e) {
        e.value ? Swal.fire({
            text: "You have successfully deleted a user!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            }
        }).then((function() {
            user_destroy_form.submit();
        })) : "cancel" === e.dismiss && Swal.fire({
            text: "User was not deleted.",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            }
        })
    }))
});

btnuser_update_form_save.addEventListener('submit', e => {
    e.preventDefault();

    Swal.fire({
        text: "Are you sure you want to save changes?",
        icon: "warning",
        showCancelButton: !0,
        buttonsStyling: !1,
        confirmButtonText: "Yes, save!",
        cancelButtonText: "No, cancel",
        customClass: {
            confirmButton: "btn fw-bold btn-danger",
            cancelButton: "btn fw-bold btn-active-light-primary"
        }
    }).then((function(e) {
        e.value ? Swal.fire({
            text: "You have successfully edited a user!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            },
            closeOnConfirm: false
        }).then((function() {
            user_update_form.submit();
        })) : "cancel" === e.dismiss && Swal.fire({
            text: "Changes was not saved.",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: {
                confirmButton: "btn fw-bold btn-primary"
            }
        })
    }))
});
