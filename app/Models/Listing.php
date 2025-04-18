<?php

namespace App\Models;

class Listing
{
  public static function all()
  {
    return [
      [
        'id' => '1',
        'title' => 'listing 1',
        'description' => 'this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description '
      ],
      [
        'id' => '2',
        'title' => 'listing 2',
        'description' => 'this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description, this is a description '
      ]
    ];
  }

  public static function find($id)
  {
    $listings = self::all();

    foreach ($listings as $listing) {
      if ($listing['id'] == $id) {
        return $listing;
      }
    }
  }
}
