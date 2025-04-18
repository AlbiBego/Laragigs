<?php
echo '<h1>' . $heading . '</h1>';

foreach ($listings as $listing) {
  echo '<h3>' . $listing['title'] . '</h3>';
  echo '<p>' . $listing['description'] . '</p>';
}
