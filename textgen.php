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
          <li class='title'>Text-Generator</li>
        </ul>
        <div id='toolbar'>
          
        </div>
      </section>
      <!-- Content -->
      <div id='content'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-ok icon-large'></i>
              Input
          </div>
          <div class='panel-body'>
            <form action="" method="POST">
              <fieldset>
                <legend>Text Generator</legend>
                <div class='form-group row'>
                  <div class='col-lg-4'>
                    <label class='control-label'>First Word</label>
                    <input type="text" id="firstString" class="form-control" placeholder="First Word" name="firstWord" required="">
                  </div>
                  <div class='col-lg-4'>
                    <label class='control-label'>Max Length</label>
                    <input type="number" class="form-control" placeholder="Sentence Length" name="sentenceLength" value="5"  aria-describedby="basic-addon1" required="">
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
                $secondWord = array($_POST['firstWord']);
                $probWord = array('');
                $i=1;
                while ($i < $_POST['sentenceLength'] +1) {
                  
                  $query = $db->query("SELECT WORD2, PROBT FROM (SELECT *FROM bigram WHERE WORD1='".$secondWord[$i-1]."' ORDER BY PROBT DESC LIMIT 10) b ORDER BY RAND() LIMIT 1");
                  $data = $query->fetch_assoc();

                  if (isset($data)) {
                    array_push($secondWord ,$data['WORD2']);
                    array_push($probWord ,$data['PROBT']);
                  }else{
                    array_push($secondWord , '<strong>.</strong>');
                    break;
                  }
                  

                  $i++;
                }

                echo "
                  <div class='panel panel-default'>
                  <div class='panel-heading'>
                    <i class='icon-ok icon-large'></i>
                    Result
                  </div>
                  <div id='txtNgram' class='panel-body'>
                    <legend>Generated Text</legend>
                    <br>
                    <div class='row'>
                      <div class='col-md-10 col-md-offset-1 text-center'>
                        <h4>
                          <strong>''
                      ";
                        foreach($secondWord as $data) {
                            echo $data.' ';
                        }
                  echo "
                        ''</strong>
                        <h4>
                      </div>
                    </div>
                  </div>
                </div>
                ";
              }
          ?>
          
          <?php
            if (isset($_POST['btnSubmit'])) {
          ?>
          
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <i class='icon-ok icon-large'></i>
              Result
            </div>
            <div class='panel-body'>
              <legend>Generated text Probability</legend>
              <br>
              <div class='row'>
                <div class='col-md-8 col-md-offset-2 text-center'>
                  <table class="table table-stripped table-responsive">
                    <thead>
                      <tr>
                        <th class="text-center">Word</th>
                        <th class="text-center">Probability</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        for ($i=0; $i <  sizeof($secondWord); $i++) { 
                          echo '<tr>';
                              echo '<td>'.$secondWord[$i].'</td>';
                              if (isset($probWord[$i+1])) {
                               echo '<td>'.$probWord[$i+1].'</td>';
                              }else{
                                echo '<td>0</td>';
                              }                              
                          echo '</tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <?php 
          }
          ?>
      </div>
    </div>
    <!-- Footer -->
    
    <?php  
      include 'footer.php';
    ?>
  </body>
</html>