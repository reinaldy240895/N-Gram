  <?php 
    include 'header.php';
  ?>

  </head>
  <body class='main page'>
    <!-- Navbar -->
    <?php
        include 'navbar.php';
    ?>

    <div id='wrapper'>
      <!-- Sidebar -->
      <?php
        include 'sidebar.php';
      ?>

      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title'>Pentagram</li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-pencil icon-large'></i>
              Input
          </div>
          <div class='panel-body'>
            <form action="" method="POST">
              <fieldset>
                <legend>Pentagram Probability Checker</legend>
                <div class='form-group row'>
                  <div class='col-lg-2'>
                    <label class='control-label'>First Word</label>
                    <input type="text" id="firstString" class="form-control" placeholder="First Word" name="firstWord" required="">
                  </div>
                  <div class='col-lg-2'>
                    <label class='control-label'>Second Word</label>
                    <input type="text" id="secondString" class="form-control" placeholder="Second Word" name="secondWord" required="">
                  </div>
                  <div class='col-lg-2'>
                    <label class='control-label'>Third Word</label>
                    <input type="text" id="thirdString" class="form-control" placeholder="Third Word" name="thirdWord" required="">
                  </div>
                  <div class='col-lg-2'>
                    <label class='control-label'>Fourth Word</label>
                    <input type="text" id="fourthString" class="form-control" placeholder="Fourth Word" name="fourthWord" required="">
                  </div>
                  <div class='col-lg-2'>
                    <label class='control-label'>Fifth Word</label>
                    <input type="text" id="fifthString" class="form-control" placeholder="Fifth Word" name="fifthWord" required="">
                  </div>
                </div>
              </fieldset>
              
              <div class='form-group'>
                <input class='btn btn-success' type='submit' name="btnSubmit" value="Generate">
              </div>
            </form>
          </div>
        </div>
        <?php 
        if (isset($_POST['btnSubmit'])) {
          $firstWord = $_POST['firstWord'];
          $secondWord = $_POST['secondWord'];
          $thirdWord = $_POST['thirdWord'];
          $fourthWord = $_POST['fourthWord'];
          $fifthWord = $_POST['fifthWord'];

          $query = $db->query("SELECT COUNT,PROBT FROM pentagram WHERE WORD1='".$firstWord."' AND WORD2 ='".$secondWord."' AND WORD3 ='".$thirdWord."' AND WORD4 ='".$fourthWord."' AND WORD5 ='".$fifthWord."'");
          $data = $query->fetch_assoc();
        ?>

        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-ok icon-large'></i>
            Result
          </div>
          <div id='txtNgram' class='panel-body'>            
            <div class='row'>
              <div class='col-md-6 text-center'>
                
              <div class="panel panel-default">
                <div class="panel-heading">
                  Pentagram Detail
                </div>
                <div class="panel-body">
                  <table class="table table-condensed table-responsive text-left">
                    <tbody>
                      <tr>
                        <td><strong>Words</strong></td>
                        <td>:</td>
                        <td>
                          <?php 
                            echo $firstWord.' '.$secondWord.' '.$thirdWord.' '.$fourthWord.' '.$fifthWord.'<br>';
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Count</strong></td>
                        <td>:</td>
                        <td>
                          <?php
                            if (isset($data)) {
                              echo $data['COUNT'];
                            }else{
                              echo '0';
                            }
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Probability</strong></td>
                        <td>:</td>
                        <td>
                          <?php 
                            if (isset($data)) {
                              echo $data['PROBT'];
                            }else{
                              echo '0';
                            }                       
                          ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>

              <div class='col-md-6'>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    Similiar Pentagram
                  </div>

                  <div class="panel-body">
                    <br>
                    <table class="table table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th>N-Gram</th>
                          <th>Count</th>
                          <th>Probability</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $query = $db->query("SELECT * FROM pentagram WHERE WORD1='".$firstWord."' AND WORD2='".$secondWord."' AND WORD5!='".$fifthWord."' ORDER BY PROBT DESC LIMIT 5");

                          if ($query->num_rows != 0) {
                            while ($data = $query->fetch_array()) {
                              echo "<tr>";
                              echo "<td class='text-left'>".$data['WORD1'].' '.$data['WORD2'].' '.$data['WORD3'].' '.$data['WORD4'].' '.$data['WORD5'].'</td>';
                              echo "<td class='text-left'>".$data['COUNT'].'</td>';
                              echo "<td class='text-left'>".$data['PROBT'].'</td>';
                              echo "</tr>";
                            }
                          }else{
                            echo "<td class='text-center' colspan='3'>No Data Available.";
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>               
              </div>
            </div>
          </div>
        </div>

        <?php 
        }
        ?>
        <!-- end of isset submit -->

    </div>
    <!-- end of container -->
    
    <?php  
      include 'footer.php';
    ?>
  </body>
</html>