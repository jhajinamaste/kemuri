<?php include('header.php'); ?>
<section id="form">
  <div class="col-6 mx-auto r-anf-cont">
    <h1 class="text-center mt-5 pageTitle">Stock Trading Analyzer</h1>
    <hr>
    <form action="processes/analyze.php" method="post">
      <div class="form-block r-fb">
        <div class="form-group r-fg-w">
          <label class="form-label mt-4" for="company">Select Stock</label>
          <select class="form-select company" id="company" name="stock">
            <?php foreach($stocks->stocks()['stock_name'] as $key => $val){ ?>
              <option value="<?php print_r($key); ?>"><?php print_r($key); ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group r-fg-mt r-fg-w">
          <label class="form-label" for="from">Start Date</label>
          <input class="form-control theDatePicker" id="from" type="text" name="start" readonly>
        </div>
        <div class="form-group r-fg-mt r-fg-w">
          <label class="form-label" for="to">End Date</label>
          <input class="form-control theDatePicker" id="to" type="text" name="end" readonly>
        </div>
        <button type="submit" class="btn btn-primary r-fg-mt r-fg-w action">Analyze</button>
      </div>
    </form>
  </div>
</section>
<section id="result">
  <div class="container mx-auto">
    <div class="stats-cont r-sc">
      <div class="row">
        <div class="col-3 r-st">Shares Purchased: <span class="shares"></span></div>
        <div class="col-3 r-st">Mean Price (Avg): <span class="mean"></span></div>
        <div class="col-3 r-st">Variance: <span class="variance"></span></div>
        <div class="col-3 r-st">Standard Deviation: <span class="sd"></span></div>
      </div>
    </div>
  </div>
  <div class="container mx-auto">
    <div class="row mt-5 pt-3">
      <div class="col-6 r-mm">
        <h4 class='card-title'>For Maximum Profit</h4>
        <hr>
        <ul>
          <li><b>Best Buying Date:</b> <span class="profitBuyDate"></span></li>
          <li><b>Best Selling Date:</b> <span class="profitSellDate"></span></li>
          <li><b>Best Buying Price:</b> &#8377; <span class="profitBuyPrice"></span></li>
          <li><b>Best Selling Price:</b> &#8377; <span class="profitSellPrice"></span></li>
          <li><b>Profit Per Share:</b> &#8377; <span class="profitPerShare"></span></li>
          <li><b>Total Profit:</b> &#8377; <span class="profitTotal"></span></li>
        </ul>
      </div>
      <div class="col-6 r-mm">
        <h4 class='card-title'>For Minimum Loss</h4>
        <hr>
        <ul>
          <li><b>Best Buying Date:</b> <span class="lossBuyDate"></span></li>
          <li><b>Best Selling Date:</b> <span class="lossSellDate"></span></li>
          <li><b>Best Buying Price:</b> &#8377; <span class="lossBuyPrice"></span></li>
          <li><b>Best Selling Price:</b> &#8377; <span class="lossSellPrice"></span></li>
          <li><b>Loss Per Share:</b> &#8377; <span class="lossPerShare"></span></li>
          <li><b>Total Loss:</b> &#8377; <span class="lossTotal"></span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php include('footer.php'); ?>