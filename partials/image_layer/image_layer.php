<?php $gridBlocks = 17 ?>

<div class="h-50 w-100 h-75 d-flex flex-column justify-content-center align-items-center text-center">
  <h2 class="display-5 display-lg-2 mb-2">
    My Technologies
  </h2>
  <p class="muted">
    The following representation is not exhaustive, while I have basic knowledge on other technologies (from school,
    out
    of interest or for researches), I decided not to include them. Any language below has been used at least once in
    my
    projects.
  </p>
</div>
<div class="h-50"></div>

<div class="grid-container">
  <div class="grid">
    <?php for ($i = 0; $i < $gridBlocks; $i++): ?>
      <?php if ($i === 3): ?>
        <div class="gridLayer centerPiece">
          <div class="gridBlock centerBlock"></div>
        </div>
      <?php else: ?>
        <div class="gridLayer">
          <div class="gridBlock"></div>
        </div>
      <?php endif ?>
    <?php endfor ?>
  </div>
</div>

<div class="h-100"></div>
<div class="h-100"></div>