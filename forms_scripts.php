<!-- GUARDAR DATOS DE JEFE DE VENTAS -->
<script>
      $(function () {
        $('#jvaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'jv_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#jveditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'jv_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#jvdeleteForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'jv_delete_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_jvlist").modal("show");
                  $("#mensaje_exito_jvlist").empty();
                  $("#mensaje_exito_jvlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#vaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'v_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#veditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'v_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#vdeleteForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'v_delete_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_vlist").modal("show");
                  $("#mensaje_exito_vlist").empty();
                  $("#mensaje_exito_vlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#prodaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'prod_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#prodeditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'prod_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#proddeleteForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'prod_delete_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_prodlist").modal("show");
                  $("#mensaje_exito_prodlist").empty();
                  $("#mensaje_exito_prodlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $("#cat").change(function() {
          var val = $(this).val();
          if(val === "JVENTAS") {
              $("#jventas_related").show();
          }
          else{
              $("#jventas_related").hide();
              $("#jventas_select").val('');
          }
        });
      });

      $(function () {
        $('#useraddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'user_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#usereditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'user_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#userdeleteForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'user_delete_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_userlist").modal("show");
                  $("#mensaje_exito_userlist").empty();
                  $("#mensaje_exito_userlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#boardaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'board_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#boardeditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'board_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#scoreboardaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'scoreboard_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });
      
      $(function () {
        $('#boardmessageaddForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'boardmessages_add_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#boardmessageeditForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'boardmessages_edit_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso").modal("show");
                  $("#mensaje_exito").empty();
                  $("#mensaje_exito").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#boardmessagedeleteForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'boardmessages_delete_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_boardmessagelist").modal("show");
                  $("#mensaje_exito_boardmessagelist").empty();
                  $("#mensaje_exito_boardmessagelist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              }
          });
        });
      });

      $(function () {
        $('#scoreboardimportForm').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'scoreboard_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar").width('100%');
              }
          });
        });
      });

      $('button[id^="tag"]').on('click', function() {  
        //alert(this.id); // Get the ID
        //alert($(this).attr('value')); // Get the value attribute
        var param = $(this).attr('value'); // Get the value attribute

        $.ajax({
            url: 'restore_v.php',
            type: 'POST',
            data: '{"id":"' + param + '"}',
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function(data) {
              if(data.status == "success"){
                console.log('Exito');
                $("#acceso").modal("show");
                $("#mensaje_exito").empty();
                $("#mensaje_exito").append(data.message);
              }
              else if(data.status == "error"){
                console.log('Error');
                $("#error").modal("show");
                $("#mensaje_error").empty();
                $("#mensaje_error").append(data.message);
              }
            }
        });
      });

      $(function () {
        $('#eqimportTb1').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'eq1_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar1").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar1").width('100%');
              }
          });
        });
      });

      $(function () {
        $('#eqimportTb2').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'eq2_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar2").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar2").width('100%');
              }
          });
        });
      });

      $(function () {
        $('#eqimportTb3').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'eq3_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar3").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar3").width('100%');
              }
          });
        });
      });

      $(function () {
        $('#eqimportTb4').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'eq4_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar4").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar4").width('100%');
              }
          });
        });
      });

      $(function () {
        $('#eqimportTb5').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing 
          $.ajax({
              url: 'eq5_import_ajax.php',
              type: 'POST',
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: "json",
              beforeSend: function() {
                  // setting a timeout
                  $("#progress-bar5").width('0%');
              },
              success: function(data) {
                if(data.status == "success"){
                  console.log('Exito');
                  $("#acceso_scoreboardlist").modal("show");
                  $("#mensaje_exito_scoreboardlist").empty();
                  $("#mensaje_exito_scoreboardlist").append(data.message);
                }
                else if(data.status == "error"){
                  console.log('Error');
                  $("#error").modal("show");
                  $("#mensaje_error").empty();
                  $("#mensaje_error").append(data.message);
                }
              },
              complete: function() {
                $("#progress-bar5").width('100%');
              }
          });
        });
      });
</script>
<!-- GUARDAR DATOS DE JEFE DE VENTAS -->