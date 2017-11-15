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
      <li class='title'>Dashboard</li>
    </ul>
    <div id='toolbar'>
      
    </div>
  </section>
  <!-- Content -->
  <div id='content'>
    <!-- Panel -->
    <div class='panel panel-default'>
      <div class='panel-heading'>
        <i class='icon-ok icon-large'></i>
        Description
        <div class='panel-tools'>
          <div class='btn-group'>
            <a class='btn' data-toggle='collapse' href='#' title='Toggle' data-target='#txtdescription'>
              <i class='icon-chevron-down'></i>
            </a>
          </div>
        </div>
      </div>
      <div id="txtdescription" class='panel-body collapse in'>
        <div class="container">
          <div class='row text-left'>
            <h4>Developed by:</h4>
            <ul>
              <li>Muhammad Ridwan, <a href="https://github.com/showbizlyra">Github</a> </li>
              <li>Reinaldy Rahmadian, <a href="https://github.com/reinaldy240895">Github</a> </li>
            </ul>

            <h4>Template by:</h4>
            <ul>
              <li>Hierapolis, <a href="https://github.com/lab2023/hierapolis">Github</a> </li>
            </ul>

            <h4>Corpus:</h4>
            <ul>
              <li>Credits: felikjunvianto, <a href="https://github.com/felikjunvianto/korpus-plagiarisme-indonesia/tree/master/source-documents">Github</a> </li>
            </ul>            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>