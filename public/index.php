<?php require_once ('layouts/header.php'); guestSession(); ?>

<h1 class="h1 home">MASJID SAYYIDINA ABU BAKAR, UTEM</h1>

<div class="content home">
  <h2> Announcement </h2>
  <p>Hanya jemaah yang lengkap 2 dos vaksinasi dibenarkan solat berjemaah di masjid.</p>
</div>
<br>

<div class="content home">
  <h2> Friday Prayers saf Reservation</h2>
  <table id="user">
  <tr>
    <td colspan="2"><h3>10 December 2021</h3></td>
  </tr>
    <tr>
      <th>Open</th>
      <th>Close</th>
  </tr>

    <tr>
      <td>Thursday : 10:00 AM</td>
      <td>Friday : 10:00 AM</td>
    </tr>
</table>
<br>
<a href="<?= constant("BASEURL") . 'public/login.php' ?>"><button class="button home-reserve">Reserve Now</button></a>
</div>

<?php require_once ('layouts/footer.php'); ?>