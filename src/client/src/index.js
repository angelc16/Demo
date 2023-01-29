import "./styles/index.css";

import "bootstrap";
import {
   sendNotification,
   showSuccessAlert,
   showErrorAlert
} from "./utils/notification.js";
import * as dotenv from "dotenv";
dotenv.config({ path: ".env" });

document.addEventListener("DOMContentLoaded", function () {
   initialize();
});

let transactionTable;
let clientId = 0;
let elInputQuantityUpdateForm = document.querySelector(
   '#form-update input[name="quantity"]'
);
let elInputTransactionUpdateForm = document.querySelector(
   '#form-update input[name="transactionId"]'
);
let elInputReasonUpdateForm = document.querySelector(
   '#form-update textarea[name="reason"]'
);
let elButtonCreate = document.getElementById("btn-create-transaction");
let elButtonModalCreate = document.getElementById("btn-modal-create");
let elButtonUpdate = document.getElementById("btn-update-transaction");

function initialize() {
   loadListeners();
   loadTables();
}

function loadListeners() {
   elButtonCreate.addEventListener("click", (e) => createTransaction());
   elButtonModalCreate.addEventListener("click", (e) => showCreateModal());
   elButtonUpdate.addEventListener("click", (e) => updateTransaction(e));
}

function loadTables() {
   let userTable = new DataTable("#dt-users", {
      ordering: false,
      paging: false,
      scrollY: "55vh",
      scrollCollapse: true,
      lengthChange: false,
      info: false,
      oLanguage: {
         sSearch: "Buscar"
      },
      ajax: function (d, cb) {
         fetch(process.env.API_URL + "command=get_clients")
            .then((response) => response.json())
            .then((data) => cb(data));
      },
      columns: [
         { title: "Id", data: "PlayerID" },
         { title: "Nombres", data: "Name" }
      ]
   });

   transactionTable = new DataTable("#dt-transactions", {
      ordering: false,
      info: false,
      searching: false,
      dom: "rtip",
      ajax: function (d, cb) {
         fetch(process.env.API_URL + "command=get_clients&user_id=" + clientId)
            .then((response) => response.json())
            .then((data) => {
               return cb({ data: data.data.transactions });
            });
      },
      select: {
         selector: "td:first-child"
      },
      language: {
         emptyTable: '<div class="transactions-empty"></div>'
      },
      columns: [
         { title: "Fecha", data: "CreationDate" },
         { title: "Canal", data: "ChannelName" },
         { title: "Banco", data: "BankName" },
         {
            title: "Monto",
            data: null,
            render: function (data, type, row, meta) {
               return data.CurrencyName + data.Quantity;
            }
         },
         {
            title: "",
            defaultContent:
               '<div class="btn btn-ligth"><i class="bi bi-eye"></i></div><div class="btn btn-secondary"><i class="bi bi-pencil-square"></i></div>',
            createdCell: function (
               cell,
               cellData,
               rowData,
               rowIndex,
               colIndex
            ) {
               $(cell).on("click", ".btn-secondary", rowData, gridButtonClick);
               $(cell).on("click", ".btn-ligth", rowData, openImage);
            }
         }
      ]
   });

   document
      .querySelector("#dt-users tbody")
      .addEventListener("click", function (e) {
         var data = userTable.row(e.target).data();
         const rows = document.querySelectorAll("#dt-users tbody tr");
         for (let i = 0; i < rows.length; i++) {
            rows[i].classList.remove("selected");
         }
         getClient(data.PlayerID);
         e.target.parentElement.classList.toggle("selected");
      });
}

function getClient(playerId) {
   fetch(process.env.API_URL + "command=get_clients&user_id=" + playerId)
   .then((res) => res.json())
   .then((d) => fillDetailUser(d.data))
   .catch(function (error) {
      clientId = 0;
      elButtonModalCreate.disabled = true;
      showErrorAlert(error.message);
      sendNotification();
   });
}
function fillDetailUser(d) {
   const inputDocument = document.querySelector(
      '#form-client input[name="documentNumber"]'
   );
   const inputId = document.querySelector('#form-client input[name="Id"]');
   const inputEmail = document.querySelector(
      '#form-client input[name="email"]'
   );
   const elBalance = document.querySelector(
      '#form-client .balance'
   );
   const inputClientId = document.querySelector(
      '#form-create input[name="clientId"]'
   );
   var balance = ''
   d.Balance.forEach(element => {
      balance += element.CurrencyName + element.Quantity + "<br>"
   });;
   const elName = document.querySelector(".detail-user > h3");
   inputClientId.value = d.Id;
   inputId.value = d.Id;
   elName.textContent = d.Name;
   inputDocument.value = d.DocumentNumber;
   inputEmail.value = d.Email;
   elBalance.innerHTML = balance;
   clientId = d.Id;
   transactionTable.ajax.reload();
   elButtonModalCreate.disabled = false;
}

function openImage(event) {
   if(event.data.Image) {
      window.open(process.env.STORAGE_URL + event.data.Image);
   } else {
      showErrorAlert('Transaccion no contiene imagen de voucher')
      sendNotification()
   }
}
function gridButtonClick(event) {
   $("#modal_transaction_update").modal("show");
   elInputQuantityUpdateForm.value = event.data.Quantity;
   elInputTransactionUpdateForm.value = event.data.Id;
   elInputReasonUpdateForm.value = "";
}

function showCreateModal() {
   var form = document.getElementById("form-create");
   form.reset();
   $("#modal_transaction_create").modal("show");
}

function createTransaction() {
   var form = document.getElementById("form-create");
   var formData = new FormData(form);
   if (validateCreateTransaction(formData)) {
      const options = { method: "POST", body: formData };
      fetch(process.env.API_URL + "command=register_transaction", options)
         .then((res) => res.json())
         .then((d) => {
            transactionTable.ajax.reload();
            getClient(formData.get('clientId'))
            $("#modal_transaction_create").modal("hide");
            showSuccessAlert("Se agrego correctamente");
         })
         .catch((e) => showErrorAlert(error.message))
         .finally(() => sendNotification());
   }
}

function validateCreateTransaction(payload) {
   return true;
}

function updateTransaction(event) {
   event.preventDefault();
   const body = {
      transactionId: elInputTransactionUpdateForm.value,
      quantity: elInputQuantityUpdateForm.value,
      reason: elInputReasonUpdateForm.value
   };
   if (validateUpdateTransaction(body)) {
      const options = {
         method: "PUT",
         headers: {
            "Content-Type": "application/json;charset=utf-8"
         },
         body: JSON.stringify(body)
      };
      fetch(process.env.API_URL + "command=update_transaction", options)
         .then((res) => res.json())
         .then((d) => {
            getClient(clientId)
            $("#modal_transaction_update").modal("hide");
            transactionTable.ajax.reload();
            showSuccessAlert("Se actualizó correctamente!");
         })
         .catch((e) => showErrorAlert(e.message))
         .finally(() => sendNotification());
   }
}
function validateUpdateTransaction(payload) {
   return true;
}
