$(document).ready(() => {
  let groupClientData = {
    type: "add",
    label: "Agregar",
    value: 0,
    name: "",
    titles: "Agregado",
  };
  let getGroupClient = (selecteds = "") => {
    $.post("getGroupClient.php", {
      Date,
    }).done(function (data) {
      let groupClient = {};
      $(".edits").remove();
      $("option").remove();
      try {
        groupClient = JSON.parse(data);
        groupClient.map((x) => {
          if (x.name == selecteds) {
            selected = "selected";
          } else {
            selected = "";
          }
          $("#groupClient").append(
            `<option value="${x.value}" ${selected}>${x.name}</option>`
          );
          let s = $("#rowGroupClient")
            .clone(true)
            .appendTo("#colGroupClient")
            .addClass("edits")
            .removeClass("font-weight-bold")
            .removeClass("border");
          s.find("#GCedit")
            .addClass("btn")
            .addClass("btn-primary")
            .addClass("btnedit")
            .data(x);
          s.find("#GCname").html(x.name);
        });
      } catch (error) {
        console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
      }

      $(".btnedit").click(function () {
        groupClientData = {
          type: "edit",
          titles: "Modificado",
          label: "Editar",
          ...$(this).data(),
        };
        $("#addGroupClient").removeClass("d-none");
        $("#GCnameVal").val($(this).data().name);
        $("#GCnameBtn").text("Editar");
        console.log("groupClientData :>> ", groupClientData);
      });
      console.log("groupClientData :>> ", groupClientData);

      if (groupClient.length == 0) {
        $("#clients").addClass("d-none");
      } else {
        $("#clients").removeClass("d-none");
      }
    });
  };
  getGroupClient();
  $("#add-GC").click(() => {
    groupClientData = {
      type: "add",
      label: "Agregar",
      value: 0,
      name: "",
      titles: "Agregado",
    };
    $("#GCnameVal").val("");
    $("#GCnameBtn").text("Agregar");
    $("#form-editor")[0].reset();
    $("#addGroupClient").removeClass("d-none");
  });

  let obj = { type: "", id: 0, titles: "" };
  $(".alert").addClass("d-none");
  $(".btn-special").attr("disabled", "disabled");
  var table = $("#clientsDataTable").DataTable({
    ajax: "getClients.php",
    columns: [
      {
        data: "name",
      },
      {
        data: "lastname",
      },
      {
        data: "email",
      },
      {
        data: "groupClient",
      },
    ],
  });

  $("#clientsDataTable tbody").on("click", "tr", function () {
    if ($(this).hasClass("bg-primary")) {
      $(this).removeClass("bg-primary");
    } else {
      $(this).addClass("bg-primary");
      $(".btn-special").removeAttr("disabled");
    }
    if (table.rows("tr.bg-primary").data().length == 0) {
      $(".btn-special").attr("disabled", "disabled");
    } else if (table.rows("tr.bg-primary").data().length > 1) {
      $("#mod").attr("disabled", "disabled");
    } else {
      $(".btn-special").removeAttr("disabled");
    }
  });

  $("#alert-close").click(() => {
    $(".alert").addClass("d-none");
  });
  $("#editor-close").click(() => {
    $("#editor").addClass("d-none");
  });

  $("#mod").click(() => {
    obj.titles = "Modificado";
    obj.type = "edit";
    $("#editor").removeClass("d-none");
    $("#senddata").text("Edit");
    obj.id = table.rows(".bg-primary").data()[0].DT_RowId;
    objt = table.rows(".bg-primary").data()[0];
    Object.entries(objt).forEach(([key, value]) => {
      $("#" + key).val(value);
      if ("groupClient" == key) {
        getGroupClient(value);
      }
    });
  });
  $("#add").click(() => {
    obj.id = 0;
    obj.type = "add";
    $("#form-editor")[0].reset();
    $("#editor").removeClass("d-none");
    $("#senddata").text("Agregar");
    obj.titles = "Agregado";
  });

  $("#form-editor").submit(function (event) {
    event.preventDefault();
    $.post("postClients.php", {
      actions: obj,
      Date,
      info: $("#form-editor")
        .serializeArray()
        .reduce(function (obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {}),
    }).done(function (data) {
      table.ajax.reload();
      getGroupClient();
      $("#form-editor")[0].reset();
      $("#editor").addClass("d-none");

      $(".alert").removeClass("d-none");
      $(".alert-heading").html("Registro " + obj.titles);
      $("#alert-data").html(data);
      $(".btn-special").attr("disabled", "disabled");
      $("tr.bg-primary").removeClass("bg-primary");
      console.log("data :>> ", data);
    });
  });
  $("#addGroupClient").submit(function (event) {
    event.preventDefault();
    $.post("postGroupClient.php", {
      actions: groupClientData,
      Date,
      info: $("#addGroupClient")
        .serializeArray()
        .reduce(function (obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {}),
    }).done(function (data) {
      table.ajax.reload();
      getGroupClient();
      $("#addGroupClient")[0].reset();
      $("#addGroupClient").addClass("d-none");

      $(".alert").removeClass("d-none");
      $(".alert-heading").html("Registro " + groupClientData.titles);
      $("#alert-data").html(data);
      $(".btn-special").attr("disabled", "disabled");
      $("tr.bg-primary").removeClass("bg-primary");
      console.log("data :>> ", data);
    });
  });
  $("#del").click(() => {
    if (
      window.confirm(
        "desea eliminar: " +
          table.rows("tr.bg-primary").data().length +
          " Registros"
      )
    ) {
      let infodato = Array();
      table
        .rows("tr.bg-primary")
        .data()
        .map((x) => infodato.push(x.DT_RowId));

      $.post("postClients.php", {
        actions: { type: "delete" },
        Date,
        info: infodato,
      }).done(function (data) {
        $(".alert").removeClass("d-none");
        $(".alert-heading").html("Registros Borrados");
        $("#alert-data").html(data);
        table.ajax.reload();
        $(".btn-special").attr("disabled", "disabled");
        $("tr.bg-primary").removeClass("bg-primary");
      });
    } else {
      $(".btn-special").attr("disabled", "disabled");
      $("tr.bg-primary").removeClass("bg-primary");
    }
  });
});
