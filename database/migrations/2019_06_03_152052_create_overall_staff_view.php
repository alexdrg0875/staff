<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOverallStaffView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
      CREATE VIEW views_overall_staff AS
      (
        SELECT staff.id AS id
            , photos.path AS photo
            , staff.name AS name
            , positions.name AS position
            , staff.salary AS salary
            , parent.name AS chief
            , staff.started_at AS employment_date
            , users.name AS owner 
        FROM staff 
        LEFT JOIN positions 
          ON staff.position_id = positions.id 
        LEFT JOIN photos 
          ON staff.photo_id = photos.id 
        LEFT JOIN staff AS parent 
          ON staff.parent_id = parent.id
        LEFT JOIN users 
          ON staff.user_id = users.id
      )
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overall_staff_view');
    }
}
