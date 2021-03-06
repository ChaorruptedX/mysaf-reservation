<html>
<body>
<?php require_once ('layouts/header.php'); ?>
<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/aboutus_design.css' ?>">
<div class="about-section">
  <h1>About Us Page</h1>
  <p>At the end of 2019, the world was rocked by an outbreak of such a violent pandemic, known as Coronavirus or Covid-19.To control and break the chain of this pandemic, the government has implemented several Standard Operating Procedure (SOP) that must be complied with by all Malaysians.</p>
  <p>With the advent of digital technology today, we plan to develop a digital system known as MySaf Reservation that is able to manage the congregation who want to perform prayers in the mosque systematically. This system will be used by the mosque to determine the total capacity of the congregation allowed to attend congregational prayers at the mosque.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
    <img src="<?= constant("BASEURL") . 'assets/image/zaki.jpg' ?>" alt="zaki" style="width:100%">
      <div class="container">
        <h5>Ameerul Zaki Bin Azlan Raous</h5>
        <p class="title">CEO & Founder</p>
        <p>B031910250</p>
        <p>zaki@gmail.com</p>
        <form style align="center" action="mailto:abu@gmail.com" target="_blank">
          <input type="submit" value="Contact" />
        </form>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img class  src="<?= constant("BASEURL") . 'assets/image/acap.jpg' ?>" alt="acap" style="width:100%">
      <div class="container">
        <h5>Mohd Asyraf Bin Mohamed Hanif</h5>
        <p class="title">Art Director</p>
        <p>B031910195</p>
        <p>acap@gmail.com</p>
        <form style align="center" action="mailto:abu@gmail.com" target="_blank">
          <input type="submit" value="Contact" />
        </form>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img src="<?= constant("BASEURL") . 'assets/image/abu.jpg' ?>" alt="abu" style="width:100%">
      <div class="container">
        <h5>Abu Dzar Bin Adam</h5>
        <p class="title">Designer</p>
        <p>B031910163</p>
        <p>abu@gmail.com</p>
        <form style align="center" action="mailto:abu@gmail.com" target="_blank">
          <input type="submit" value="Contact" />
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
