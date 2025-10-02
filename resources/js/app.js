import "./bootstrap";
import Swal from "sweetalert2";

import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.default.css";

window.Swal = Swal;
window.TomSelect = TomSelect;

// Sweet Alert 2
window.deleteSwal = (event) => {
    Swal.fire({
        title: "Lakukan Penghapusan Data ?",
        text: "Data terhapus tidak dapat di-pulihkan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#dd3333",
        cancelButtonColor: "#666666",
        confirmButtonText: "Ya, Hapus Data!",
        cancelButtonText: "Batalkan Aksi",
    }).then((result) => {
        if (result.isConfirmed) {
            event && event();
        }
    });
};

window.verifySwal = (event) => {
    Swal.fire({
        title: "Ajukan Verifikasi Data ?",
        text: "Data Yang di-Ajukan Tidak Dapat di-Ubah Informasinya!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#4f46e5",
        cancelButtonColor: "#666666",
        confirmButtonText: "Ya, Lakukan Pengajuan!",
        cancelButtonText: "Batalkan Aksi",
    }).then((result) => {
        if (result.isConfirmed) {
            event && event();
        }
    });
};

window.Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
});

// Tom Select Shi
// window.initTomSelect = function (selector, options = {}) {
//     const el = document.querySelector(selector);
//     if (el && !el.tomselect) {
//         new TomSelect(el, {
//             create: false,
//             sortField: { field: "text", direction: "asc" },
//             plugins: ["dropdown_input"],
//             maxItems: 1,
//             allowEmptyOption: false,
//             onChange(value) {
//                 Livewire.find(
//                     el.closest("[wire\\:id]").getAttribute("wire:id")
//                 ).set(el.getAttribute("wire:model"), value);
//             },
//             ...options,
//         });
//     }
// };
