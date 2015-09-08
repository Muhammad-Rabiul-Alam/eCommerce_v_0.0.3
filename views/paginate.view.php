  <style>
    .mypager{
      text-align: center;
      border-radius: 22px;
      margin-bottom: 10px;
      font: 17px bold;
    }
    .mypager:hover {box-shadow: 0 0 10px rgba(0,0,0,2);}
  </style>

	<div class="col-lg-12">
      <div class="col-lg-4"></div>
      <div class="col-lg-4" align="center">
        <form action="" method="POST" role="form">
          <button <?= $disable_pre; ?> type="submit" name="previous" value="previous" class="btn btn-default mypager">Previous</button>
          <button <?= $disable_nxt; ?> type="submit" name="next" value="next" class="btn btn-default mypager">Next</button>
        </form> 
      </div>
      <div class="col-lg-4"></div>
    </div>