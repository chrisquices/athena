const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

const MESSAGE_SUCCESS = "La operación ha sido exitosa!";
const MESSAGE_ERROR = "Athena estaría decepcionada en ti!";

const SPANISH = {
    processing: "Procesando...",
    lengthMenu: "Mostrar _MENU_ registros",
    zeroRecords: "No se encontraron resultados",
    emptyTable: "Ningún dato disponible en esta tabla",
    info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    infoFiltered: "(filtrado de un total de _MAX_ registros)",
    search: "Buscar:",
    loadingRecords: "Cargando...",
    paginate: {
        next: "Siguiente",
        previous: "Anterior",
    },
};

let btnGenerate = "generate";

let areaId = ["column_area_id", "Área"];
let nationalityId = ["column_area_id", "Nacionalidad"];
let cityId = ["column_city_id", "Ciudad"];

let name = ["column_name", "Nombre"];
let lastName = ["column_last_name", "Apellido"];
let nameAlternative = ["column_name_alternative", "Nombre Alternativo"];
let documentType = ["column_document_type", "Tipo de Documento"];
let documentNumber = ["column_document_number", "Número de Documento"];
let birthDate = ["column_birth_date", "Fecha de Nacimiento"];
let address = ["column_address", "Dirección de Domicilio"];
let telephone = ["column_telephone", "Teléfono"];
let telephoneAlternative = [
    "column_telephone_alternative",
    "Teléfono Alternativo",
];
let type = ["column_type", "Tipo"];
let acronym = ["column_acronym", "Acrónimo"];
let status = ["column_status", "Estado"];
let createdAt = ["column_created_at", "Fecha de creación"];
let updatedAt = ["column_updated_at", "Fecha de actualización"];

// Container variables from Reports
let containerGenerate = "container_generate";
let containerColumns = "container_columns";

let containerNationalityId = "container_nationality_id";
let containerCityId = "container_city_id";

let containerDocumentType = "container_document_type";
let containerBirthDate = "container_birth_date";
let containerBirthDateFrom = "container_birth_date_from";
let containerBirthDateTo = "container_birth_date_to";
let containerSex = "container_sex";

// Toastr options
toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: true,
    progressBar: true,
    positionClass: "toast-bottom-right",
    preventDuplicates: true,
    onclick: null,
    showDuration: 300,
    hideDuration: 300,
    timeOut: 3000,
    extendedTimeOut: 1000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

$("#datatable").DataTable({
    destroy: true,
    language: SPANISH,
    lengthMenu: [
        [30, 60, 90, -1],
        [30, 60, 90],
    ],
    dom: 'l<"toolbar">frtip',
});

$(document).ajaxSend(function () {
    showProgressBar();
});

$(document).ajaxComplete(function () {
    hideProgressBar();
});

$(document).ready(function () {
    hideProgressBar();
});

function showProgressBar() {
    $(".progress-bar-container").fadeIn();
}

function hideProgressBar() {
    $(".progress-bar-container, .blank-container").fadeOut();
}

function applyStatusIconAndColor(data) {
    switch (data.status) {
        case "Activo":
            return `<i class='fa fa-check-circle me-2'></i>${data.status}`;
            break;

        case "Inactivo":
            return `<i class='fa fa-power-off me-2'></i>${data.status}`;
            break;

        case "Anulado":
            return `<i class='fa fa-times-circle me-2'></i>${data.status}`;
            break;

        case "Bloqueado":
            return `<i class='fa fa-ban me-2'></i>${data.status}`;
            break;

        default:
            break;
    }
}

function toggleContainerVisibility(toShow, toHide) {
    toShow.forEach((element) => {
        $(`#${element}`).show(300);
    });

    toHide.forEach((element) => {
        $(`#${element}`).hide(300);
        if ($(`#${element.replace("container_", "")}`).is("select")) {
            $(`#${element.replace("container_", "")}`)
                .val("")
                .change();
        } else {
            $(`#${element.replace("container_", "")}`).val("");
        }
    });
}

function toggleColumnVisibility(columns) {
    $("#columns").empty();

    columns.forEach((element) => {
        $("#columns").append(`
            <li class="list-group-item">
                <div class="form-check">
                    <input name="${
                        element[0]
                    }" class="form-check-input" type="checkbox"
                        ${
                            element[0] == "column_created_at" ||
                            element[0] == "column_updated_at" ||
                            element[0] == "column_status"
                                ? ""
                                : "checked"
                        }>
                    <label class="form-check-label" for="${element[0]}">${
            element[1]
        }</label>
                </div>
            </li>
        `);
    });
}

function addAddButtonToTable() {
    $("div.toolbar").html(`
        <a href="${window.location.pathname}/create" class="btn btn-sm btn-primary ms-2">
            <i class="fa fa-plus"></i>
        </a>
    `);
}

addAddButtonToTable();

$(document).ready(function () {
    $("a").on("click", function () {
        if (
            !$(this).hasClass("has-arrow") &&
            !$(this).hasClass("page-link") &&
            !$(this).hasClass("nav-link") &&
            !$(this).hasClass("btn-finalize") &&
            !$(this).find("i").hasClass("fa-lock") &&
            !$(this).find("i").hasClass("fa-redo") &&
            !$(this).find("i").hasClass("fa-print") &&
            !$(this).find("i").hasClass("fa-ban") &&
            !$(this).find("i").hasClass("fa-trash")
        ) {
            $(".blank-container").fadeIn(200);
        }
    });
});

$(".btn-confirmation").attr("onClick", "return confirm('Confirmar');");

function addBtnConfirmation() {
    $(".btn-confirmation").attr("onClick", "return confirm('Confirmar');");
}
