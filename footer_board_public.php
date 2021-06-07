    <footer class="footer">
      <div class="container-fluid">
        <div class="row" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
          <div class="comments-marquee">
            <ul>
              <?php
                $msg_activo = 1;
                $sql = "SELECT * FROM `messages` WHERE `id_board` = '1' AND `activo` = '$msg_activo'";
                $query = $conn->query($sql);  

                while($row = $query->fetch_assoc()){
                  $autor = $row['id_admin'];
                  $sqladm = "SELECT * FROM `admin` WHERE `id_admin` = '$autor'";
                  $queryadm = $conn->query($sqladm);
                  $rowadm = $queryadm->fetch_assoc();
                  $adm_name=utf8_encode($rowadm["nombre"])." ".utf8_encode($rowadm["apellido"]);
                  ?>
                  <li><i class="fa fa-comment"></i><strong><?php echo $adm_name; ?>:</strong> <?php echo utf8_encode($row['contenido']); ?> </li>
                  <?php
                }
              ?>
            </ul>
          </div>
          <div>
            <?php
                if($category=="TAB"){
              ?>
              <div style="line-height: 35px; height: 50px;">
                <a class="nav-link" href="logout.php?ch=logout" style="color: #fff;">
                  <i class="fa fa-sign-out"></i> Salir
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </footer>


    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <!-- DataTables -->
    <script src="node_modules/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Auto scroll text -->
    <script src="js/jQuery.scrollText.js"></script>
    <!-- TABLE SORTENER -->    
    <script src="js/jquery.tablesorter.min.js"></script>

    <script type="text/javascript">
        $("#myTable").tablesorter();

        $(".comments-marquee").scrollText({
            // container
            'comments-marquee': '.comments-marquee', 

            // child elements
            'sections': 'li', 

            // scrolling speed
            'duration': 3000,

            // endless loop
            'loop': true,

            // CSS appended to the current item
            'currentClass': 'current',

            // or 'down'
            'direction': 'up'
            
          });
    </script>
  </body>
</html>