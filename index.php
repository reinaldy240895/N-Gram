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
            Program Description:
            <div class='panel-tools'>
               <div class='btn-group'>
                  <a class='btn' data-toggle='collapse' href='#' title='Toggle' data-target='#txtdescription'>
                     <i class='icon-chevron-down'></i>
                  </a>
               </div>
            </div>
         </div>
         <div id="txtdescription" class='panel-body collapse in'>
            <div class='row text-left'>
               <div class="container">
                  <p>
                  <h2>Program Description: Indonesian Language Model</h2>
                  <hr>
                     An implementation of a HMM Ngram language model in php.<br>

                     Currently implements basic NGram analysis, and provides an interface to generate text <br>
                     with given first word and sentence length using Markov Chains Model based from N-Gram Probability.
                  <h2>Corpus Description</h2>
                  <p>Documents for this corpus were acquired from following sources.</p>
                  <ul>
                     <li>translation of PAN CLEF articles,</li>
                     <li>Indonesian blogs,</li>
                     <li>other corpora (<a href="http://www.kompas.com/">Kompas</a> articles &amp; film reviews),</li>
                     <li><a href="https://id.wikipedia.org/wiki/Wikipedia:Artikel_pilihan">featured articles from Wikipedia Bahasa Indonesia</a>, and</li>
                     <li>novels in Bahasa Indonesia (local &amp; translated).</li>
                  </ul>
                  <p>After the documents were collected, each document was preprocessed with following steps.</p>
                  <ul>
                     <li>performing normalization so that each line of the document contains maximum of 100 characters.</li>
                     <li>removing extra space characters at the end of paragraph, in-between paragraphs, and before any punctuation marks.</li>
                     <li>removing extra characters like <code>. , ? !.</code></li>
                     <li>replacing some non-ASCII characters with its ASCII counterpart, for example replacing <code>”</code> character inside document with <code>&quot;</code> character.</li>
                  </ul>
                  <p>Statistics of this plagiarism corpus in bahasa Indonesia are as follows.</p>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class='panel panel-default'>
         <div class='panel-heading'>
            <i class='icon-ok icon-large'></i>
            Description
            <div class='panel-tools'>
               <div class='btn-group'>
                  <a class='btn' data-toggle='collapse' href='#' title='Toggle' data-target='#txtNgram'>
                     <i class='icon-chevron-down'></i>
                  </a>
               </div>
            </div>
         </div>
         <div id='txtNgram' class='panel-body collapse in'>
            </div>
            <div class='row text-left'>
               <div class="container">
                  <h4>Corpus statics</h4>
               <hr>
               <?php 
                  $query = $db->query("SELECT (SELECT SUM(COUNT) FROM unigram) as TOTAL, (SELECT COUNT(*) FROM unigram) as COUNT1, (SELECT COUNT(*) FROM bigram) as COUNT2, (SELECT COUNT(*) FROM trigram) as COUNT3, (SELECT COUNT(*) FROM tetragram) as COUNT4, (SELECT COUNT(*) FROM pentagram) as COUNT5");
                  if ($query) {
                     if ($query->num_rows != 0) {
                        $data = $query->fetch_assoc();
                     }
                  }
               ?>
               <ul>
               <li>Source documents = <strong>30</strong></li>
               <li>Total Words = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['TOTAL'] : 0) : 0); ?></strong></li>
               <li>Total Unigram = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['COUNT1'] : 0) : 0); ?></strong></li>
               <li>Total Bigram = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['COUNT2'] : 0) : 0); ?></strong></li>
               <li>Total Trigram = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['COUNT3'] : 0) : 0); ?></strong></li>
               <li>Total Tetragram = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['COUNT4'] : 0) : 0); ?></strong></li>
               <li>Total Pentagram = <strong><?php echo (($query) ? (($query->num_rows != 0) ? $data['COUNT5'] : 0) : 0); ?></strong></li>
               </ul>
               <p>Corpus cited From: <a href="https://github.com/felikjunvianto/korpus-plagiarisme-indonesia/tree/master/source-documents">here</p>
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