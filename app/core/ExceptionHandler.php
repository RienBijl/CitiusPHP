<?php

function handleException($exception)
{
  ?>

  <script type="text/javascript">
    document.body.innerHTML = '';
  </script>

  <style media="screen">
    .scroll {
      height: 50%;
      max-height: 50%;
      border: 1px solid black;
      width: 100%;
      padding: 1em;
      overflow: auto;
    }
  </style>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <?php if(!$GLOBALS['conf_config']->production) { ?>
      <div class="col-md-2 col-sm-12">
        <legend>Stacktrace</legend>
        <div class="card">
          <div class="card-header">
            Simple trace
          </div>
          <div class="card-body">
            <?= $exception->getMessage() ?>. <b>File:</b> <i><?= $exception->getFile() ?></i> <b>Line:</b> <i><?= $exception->getLine() ?></i>
          </div>
        </div>
        <hr>
        <div class="scroll">
          <?php
          $count = count($exception->getTrace());
          foreach($exception->getTrace() as $x)
          {
            ?>
            <div class="card">
              <div class="card-header">
                Step <?= $count ?>
              </div>
              <div class="card-body">
                <b>File:</b> <i><?= $x['file'] ?></i> <b>Line:</b> <i><?= $x['line'] ?></i>
              </div>
            </div> <br>
            <?php
            $count--;
          }
          ?>
        </div>
      </div>
    <?php } ?>
      <div class="col-md-10 col-sm-12">
        <div class="card">
          <div class="card-body">
            <h2>Stopped code run</h2> <hr>
            Oops! Something went terribly wrong. For safety purposes the run was stopped.
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php
  exit;
}

set_error_handler("handleException");

set_exception_handler("handleException");
