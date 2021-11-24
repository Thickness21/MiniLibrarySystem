"use strict";
var KTBooksList = function() {
	var e, t, n, r, o = document.getElementById("kt_table_books"),
		c = () => {
			o.querySelectorAll('[data-kt-books-table-filter="delete_row"]').forEach((t => {
				t.addEventListener("click", (function(t) {
					t.preventDefault();
					const n = t.target.closest("tr"),
						r = n.querySelectorAll("td")[1].querySelectorAll("a")[1].innerText;
					Swal.fire({
						text: "Are you sure you want to delete " + r + "?",
						icon: "warning",
						showCancelButton: !0,
						buttonsStyling: !1,
						confirmButtonText: "Yes, delete!",
						cancelButtonText: "No, cancel",
						customClass: {
							confirmButton: "btn fw-bold btn-danger",
							cancelButton: "btn fw-bold btn-active-light-primary"
						}
					}).then((function(t) {
						t.value ? Swal.fire({
							text: "You have deleted " + r + "!.",
							icon: "success",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary"
							}
						}).then((function() {
							e.row($(n)).remove().draw()
						})).then((function() {
							a()
						})) : "cancel" === t.dismiss && Swal.fire({
							text: customerName + " was not deleted.",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn fw-bold btn-primary"
							}
						})
					}))
				}))
			}))
		},
		l = () => {
			const c = o.querySelectorAll('[type="checkbox"]');
			t = document.querySelector('[data-kt-book-table-toolbar="base"]'), n = document.querySelector('[data-kt-book-table-toolbar="selected"]'), r = document.querySelector('[data-kt-book-table-select="selected_count"]');
			const s = document.querySelector('[data-kt-book-table-select="delete_selected"]');
			c.forEach((e => {
				e.addEventListener("click", (function() {
					setTimeout((function() {
						a()
					}), 50)
				}))
			})), s.addEventListener("click", (function() {
				Swal.fire({
					text: "Are you sure you want to delete selected books?",
					icon: "warning",
					showCancelButton: !0,
					buttonsStyling: !1,
					confirmButtonText: "Yes, delete!",
					cancelButtonText: "No, cancel",
					customClass: {
						confirmButton: "btn fw-bold btn-danger",
						cancelButton: "btn fw-bold btn-active-light-primary"
					}
				}).then((function(t) {
					t.value ? Swal.fire({
						text: "You have deleted all selected books!.",
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary"
						}
					}).then((function() {
						c.forEach((t => {
							t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
						}));
						o.querySelectorAll('[type="checkbox"]')[0].checked = !1
					})).then((function() {
						a(), l()
					})) : "cancel" === t.dismiss && Swal.fire({
						text: "Selected users was not deleted.",
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn fw-bold btn-primary"
						}
					})
				}))
			}))
		};
	const a = () => {
		const e = o.querySelectorAll('tbody [type="checkbox"]');
		let c = !1,
			l = 0;
		e.forEach((e => {
			e.checked && (c = !0, l++)
		})), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
	};
	return {
		init: function() {
			o && (o.querySelectorAll("tbody tr").forEach((e => {
				const t = e.querySelectorAll("td");
				const l = moment(t[2].innerHTML, "DD MMM YYYY").format();
				t[2].setAttribute("data-order", l)
			})), (e = $(o).DataTable({
				info: !1,
				order: [],
				pageLength: 10,
				lengthChange: !1,
				columnDefs: [{
					orderable: !1,
					targets: 0
				}, {
					orderable: !1,
					targets: -1
				}]
			})).on("draw", (function() {
				l(), c(), a()
			})), l(), document.querySelector('[data-kt-book-table-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			})), document.querySelector('[data-kt-book-table-filter="reset"]').addEventListener("click", (function() {
				document.querySelector('[data-kt-book-table-filter="form"]').querySelectorAll("select").forEach((e => {
					$(e).val("").trigger("change")
				})), e.search("").draw()
			})), c(), (() => {
				const t = document.querySelector('[data-kt-book-table-filter="form"]'),
					n = t.querySelector('[data-kt-book-table-filter="filter"]'),
					r = t.querySelectorAll("select");
				n.addEventListener("click", (function() {
					var t = "";
					r.forEach(((e, n) => {
						e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
					})), e.search(t).draw()
				}))
			})())
		}
	}
}();
KTUtil.onDOMContentLoaded((function() {
	KTBooksList.init()
}));